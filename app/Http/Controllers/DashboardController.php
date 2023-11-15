<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyActivitiesCharts;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(MonthlyActivitiesCharts $chart)
    {
        $pj = Auth::user()->id;


        if (Gate::allows('superAdminAndAdmin')) {
            $activities = Activity::orderBy('status_id')->orderBy('created_at', 'desc')->get(['id', 'name', 'todos', 'created_at', 'status_id']);
        } else {
            $activities = Activity::orderBy('status_id')->orderBy('created_at', 'desc')->where('user_id', '=', $pj)->get(['id', 'user_id', 'name', 'todos', 'created_at', 'status_id']);
        }

        return view('app.dashboard.index', [
            'activities' => $activities,
            'chart' => $chart->build(),
        ]);
    }
}
