<?php

namespace App\Http\Controllers;

use App\Exports\ActivitiesExport;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function generateExcel(Request $request) {

        $searchPDF = $request->searchPDF;
        $searchByStartDate = $request->searchByStartDate;
        $searchByEndDate = $request->searchByEndDate;
        $departmentSelected = $request->searchByDepartment;

        if($departmentSelected) {
            $data = Activity::with('department','division','user')
            ->where('department_id','=',$departmentSelected)
            ->latest()->paginate(10);
        }elseif($searchPDF){
            $data = Activity::where('name','like','%'.$searchPDF.'%')
                        ->orWhereHas('department', function($q) use($searchPDF){
                                $q->where('name','like','%' .$searchPDF.'%');
                            })->latest()->get();
        }elseif($searchByStartDate || $searchByEndDate){
            if(($searchByStartDate) && (!$searchByEndDate || $searchByEndDate == null)){
                $data = Activity::with('department','division','user')
                            ->whereDate('created_at','>=',$searchByStartDate)
                            ->latest()->paginate(10);
            }
            elseif((!$searchByStartDate || $searchByStartDate == null) && ($searchByEndDate)){
                $data = Activity::with('department','division','user')
                            ->whereDate('created_at','<=',$searchByEndDate)
                            ->latest()->paginate(10);
            }else{
                $data = Activity::with('department','division','user')
                            ->whereDate('created_at','>=',$searchByStartDate)
                            ->whereDate('created_at','<=',$searchByEndDate)
                            ->latest()->paginate(10);
            }
        }else{
            $data = Activity::whereMonth('created_at','=',now())->latest()->get();
        }
        
        $next_month = Carbon::parse(now()->addMonth(1))->translatedFormat('F');
        $currentMonth = Carbon::parse(now())->translatedFormat('F');
        $currentYear = Carbon::parse(now())->translatedFormat('Y');
        $x = [];
    
        
         foreach ($data as $activity) {
            $activity['financial_target'] = round($activity['financial_target'] / $activity->budget * 100, 2);
            $activity['financial_realization'] = round($activity['financial_realization'] / $activity->budget * 100, 2);
            $activity['physical_target'] = round($activity['physical_target'] / $activity->budget * 100, 2);
            $activity['physical_realization'] = round($activity['physical_realization'] / $activity->budget * 100, 2);
            array_push($x,$activity->department->name);
         }

         $department_array = array_unique($x);


        return Excel::download(new ActivitiesExport($data,$department_array,$next_month,$currentMonth,$currentYear), 'E-Monev BSIP Mektan - ' . now($tz='GMT+7')->translatedFormat('d F Y') .  '.xlsx');
    }
}
