<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePDF(Request $request)
    {
        $searchPDF = $request->searchPDF;
        $searchByStartDate = $request->searchByStartDate;
        $searchByEndDate = $request->searchByEndDate;
        $departmentSelected = $request->searchByDepartment;
        $activity_id = $request->activity_id;

        if ($departmentSelected) {
            $data = Activity::with('department', 'division', 'user')
                ->where('department_id', '=', $departmentSelected)
                ->latest()->paginate(10);
        } elseif ($searchPDF) {
            $data = Activity::where('name', 'like', '%' . $searchPDF . '%')
                ->orWhereHas('department', function ($q) use ($searchPDF) {
                    $q->where('name', 'like', '%' . $searchPDF . '%');
                })->latest()->get();
        } elseif ($searchByStartDate || $searchByEndDate) {
            if (($searchByStartDate) && (!$searchByEndDate || $searchByEndDate == null)) {
                $data = Activity::with('department', 'division', 'user')
                    ->whereDate('created_at', '>=', $searchByStartDate)
                    ->latest()->paginate(10);
            } elseif ((!$searchByStartDate || $searchByStartDate == null) && ($searchByEndDate)) {
                $data = Activity::with('department', 'division', 'user')
                    ->whereDate('created_at', '<=', $searchByEndDate)
                    ->latest()->paginate(10);
            } else {
                $data = Activity::with('department', 'division', 'user')
                    ->whereDate('created_at', '>=', $searchByStartDate)
                    ->whereDate('created_at', '<=', $searchByEndDate)
                    ->latest()->paginate(10);
            }
        } elseif ($activity_id) {
            $data = Activity::with('department', 'division', 'user')
                ->where('id', '=', $activity_id)
                ->latest()->get();
        } else {
            $data = Activity::whereMonth('created_at', '=', now())->latest()->get();
        }

        $next_month = Carbon::parse(now()->addMonth(1))->translatedFormat('F');
        $currentMonth = Carbon::parse(now())->translatedFormat('F');
        $currentYear = Carbon::parse(now())->translatedFormat('Y');
        $department_array = [];
        $pj_array = [];
        $budget = [];


        foreach ($data as $activity) {
            $activity['financial_target'] = round($activity['financial_target'] / $activity->budget * 100, 2);
            $activity['financial_realization'] = round($activity['financial_realization'] / $activity->budget * 100, 2);
            $activity['physical_target'] = round($activity['physical_target'] / $activity->budget * 100, 2);
            $activity['physical_realization'] = round($activity['physical_realization'] / $activity->budget * 100, 2);
            array_push($department_array, $activity->department->name);
            array_push($budget, $activity->budget);
            array_push($pj_array, $activity->user->name);
        }


        $department_array_result = array_unique($department_array);
        $pj_array_result = array_unique($pj_array);
        $totalBudget = array_sum(array_unique($budget));

        $pdf = Pdf::loadView('app/activities/generatePDF', compact('data', 'next_month', 'currentMonth', 'currentYear', 'department_array_result', 'pj_array_result', 'totalBudget'));

        return $pdf->stream('pdf_file.pdf');
    }
}
