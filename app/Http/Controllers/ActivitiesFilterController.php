<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivitiesFilterController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        if ($request->filled('search')) {
            if ($search == 'PE' || $search == 'pe') {
                $activities = Activity::where('department_id', '=', 1)->latest()->paginate(10);
            } elseif ($search == 'SP' || $search == 'sp') {
                $activities = Activity::where('department_id', '=', 2)->latest()->paginate(10);
            } elseif ($search == 'KSPHP' || $search == 'ksphp') {
                $activities = Activity::where('department_id', '=', 3)->latest()->paginate(10);
            } elseif ($search == 'TU' || $search == 'tu') {
                $activities = Activity::where('department_id', '=', 4)->latest()->paginate(10);
            } else {
                $activities = Activity::where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('department', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    })->latest()->paginate(10);
            }
            $next_month = Carbon::parse(now()->addMonth(1))->translatedFormat('F');
        } else {
            return redirect()->to('/app/activities');
        }

        foreach ($activities as $activity) {
            $activity['financial_target'] = round($activity['financial_target'] / $activity->budget * 100, 2);
            $activity['financial_realization'] = round($activity['financial_realization'] / $activity->budget * 100, 2);
            $activity['physical_target'] = round($activity['physical_target'] / $activity->budget * 100, 2);
            $activity['physical_realization'] = round($activity['physical_realization'] / $activity->budget * 100, 2);
        }


        $departments = Department::orderBy('name')->get();
        $users = User::orderBy('name')->get(['id', 'name']);


        return view('app.activities.index', [
            'activities' => $activities,
            'departments' => $departments,
            'users' => $users,
            'next_month' => $next_month,
        ]);
    }

    public function filter(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $departmentSelected = $request->filterByDepartment;
        $userSelected = $request->filterByUser;

        if ($departmentSelected) {
            $activities = Activity::with('department', 'division', 'user')
                ->where('department_id', '=', $departmentSelected)
                ->latest()->paginate(10);
        } elseif ($userSelected) {
            $activities = Activity::with('department', 'division', 'user')
                ->where('user_id', '=', $userSelected)
                ->latest()->paginate(10);
        } elseif ((!$startDate || $startDate == null) && (!$endDate || $endDate == null)) {
            $activities = Activity::with('department', 'division', 'user')
                ->whereMonth('created_at', '=', now())
                ->latest()->paginate(10);
        } elseif (($startDate) && (!$endDate || $endDate == null)) {
            $activities = Activity::with('department', 'division', 'user')
                ->whereDate('created_at', '>=', $startDate)
                ->latest()->paginate(10);
        } elseif ((!$startDate || $startDate == null) && ($endDate)) {
            $activities = Activity::with('department', 'division', 'user')
                ->whereDate('created_at', '<=', $endDate)
                ->latest()->paginate(10);
        } else {
            $activities = Activity::with('department', 'division', 'user')
                ->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate)
                ->latest()->paginate(10);
        }


        foreach ($activities as $activity) {
            $activity['financial_target'] = round($activity['financial_target'] / $activity->budget * 100, 2);
            $activity['financial_realization'] = round($activity['financial_realization'] / $activity->budget * 100, 2);
            $activity['physical_target'] = round($activity['physical_target'] / $activity->budget * 100, 2);
            $activity['physical_realization'] = round($activity['physical_realization'] / $activity->budget * 100, 2);
        }

        $departments = Department::orderBy('name')->get();
        $users = User::orderBy('name')->get(['id', 'name']);
        $next_month = Carbon::parse(now()->addMonth(1))->translatedFormat('F');

        return view('app.activities.index', [
            'activities' => $activities,
            'departments' => $departments,
            'users' => $users,
            'next_month' => $next_month,
        ]);
    }
}
