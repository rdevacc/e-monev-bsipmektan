<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $pj = Auth::user()->id;

        if (Gate::allows('superAdminAndAdmin')) {
            $activities = Activity::orderBy('status')->orderBy('created_at', 'desc')->get(['id', 'name', 'todos', 'created_at', 'status']);
        } else {
            $activities = Activity::orderBy('status')->orderBy('created_at', 'desc')->where('user_id', '=', $pj)->get(['id', 'name', 'todos', 'created_at', 'status']);
        }

        return view('app.dashboard.index', [
            'activities' => $activities,
        ]);
    }
}
