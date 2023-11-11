<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Department;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class ActivityController extends Controller
{

    public function index()
    {

        $activities = Activity::orderBy('created_at', 'desc')->paginate(10);
        $next_month = Carbon::parse(now()->addMonth(1))->translatedFormat('F');
        $departments = Department::orderBy('name')->get();
        $users = User::orderBy('name')->get(['id', 'name']);

        foreach ($activities as $activity) {
            $activity['financial_target'] = round($activity['financial_target'] / $activity->budget * 100, 2);
            $activity['financial_realization'] = round($activity['financial_realization'] / $activity->budget * 100, 2);
            $activity['physical_target'] = round($activity['physical_target'] / $activity->budget * 100, 2);
            $activity['physical_realization'] = round($activity['physical_realization'] / $activity->budget * 100, 2);
        }

        return view('app.activities.index', [
            'activities' => $activities,
            'next_month' => $next_month,
            'departments' => $departments,
            'users' => $users,
        ]);
    }

    public function show(Activity $activity)
    {

        $currentMonth = Carbon::parse(now())->translatedFormat('F');
        $currentYear = Carbon::parse(now())->translatedFormat('Y');
        $next_month = Carbon::parse(now()->addMonth(1))->translatedFormat('F');


        $activity['financial_target'] = round($activity['financial_target'] / $activity->budget * 100, 2);
        $activity['financial_realization'] = round($activity['financial_realization'] / $activity->budget * 100, 2);
        $activity['physical_target'] = round($activity['physical_target'] / $activity->budget * 100, 2);
        $activity['physical_realization'] = round($activity['physical_realization'] / $activity->budget * 100, 2);


        return view('app.activities.show', [
            'activity_id' => $activity->id,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'next_month' => $next_month,
            'activity' => $activity,
        ]);
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        $departments = Department::orderBy('name')->get();
        $divisions = Division::orderBy('name')->get();

        return view('app.activities.create', [
            'users' => $users,
            'departments' => $departments,
            'divisions' => $divisions,
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required',
            'department_id' => 'required',
            'division_id' => 'required',
            'name' => 'required',
            'budget' => 'required',
            'financial_target' => 'required',
            'financial_realization' => 'required',
            'physical_target' => 'required',
            'physical_realization' => 'required',
            'dones' => 'required',
            'problems' => 'required',
            'follow_up' => 'required',
            'todos' => 'required',
        ]);

        if (is_null(Arr::last($validated['dones']))) {
            $x = Arr::last($validated['dones']);
            $x = '-';
            return $validated['dones'];
        }
        if (is_null(Arr::last($validated['problems']))) {
            return dd("problems Null");
        }
        if (is_null(Arr::last($validated['follow_up']))) {
            return dd("follow_up Null");
        }
        if (is_null(Arr::last($validated['todos']))) {
            return dd("todos Null");
        }

        Activity::create($validated);

        return redirect('/app/activities');
    }

    public function edit(Activity $activity)
    {
        if ($this->authorize('update-activity', $activity) || $this->authorize('superAdminAndAdmin')) {
            $users = User::orderBy('name')->get();
            $departments = Department::orderBy('name')->get();
            $divisions = Division::orderBy('name')->get();

            return view('app.activities.edit', [
                'users' => $users,
                'departments' => $departments,
                'divisions' => $divisions,
                'activity' => $activity,
            ]);
        };
    }

    public function update(Request $request, Activity $activity)
    {

        $validated = $request->validate([
            'user_id' => 'required',
            'department_id' => 'required',
            'division_id' => 'required',
            'name' => 'required',
            'budget' => 'required',
            'financial_target' => 'required',
            'financial_realization' => 'required',
            'physical_target' => 'required',
            'physical_realization' => 'required',
            'dones' => 'required',
            'problems' => 'required',
            'follow_up' => 'required',
            'todos' => 'required',
        ]);


        if (is_null(Arr::last($validated['dones']))) {
            $x = Arr::last($validated['dones']);
            $x = '-';
            return $validated['dones'];
        }
        if (is_null(Arr::last($validated['problems']))) {
            return dd("problems Null");
        }
        if (is_null(Arr::last($validated['follow_up']))) {
            return dd("follow_up Null");
        }
        if (is_null(Arr::last($validated['todos']))) {
            return dd("todos Null");
        }

        $activity->update($validated);

        return redirect()->to('/app/activities');
    }

    public function destroy(Activity $activity)
    {

        Activity::destroy($activity->id);

        return redirect()->to('/app/activities/');
    }

    public function fetchBudget(Request $request)
    {
        $activities['budget'] = Department::where('id', $request->department_id)->get(['budget']);


        return response()->json($activities);
    }
}
