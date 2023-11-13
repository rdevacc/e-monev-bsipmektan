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
            // 'financial_target' => 'required',
            // 'financial_realization' => 'required',
            // 'physical_target' => 'required',
            // 'physical_realization' => 'required',
            'dones.*' => 'required',
            'problems.*' => 'required',
            'follow_up.*' => 'required',
            'todos.*' => 'required',
        ], [
            'user_id.required' => 'User id field is required!',
            'department_id.required' => 'Department id field is required!',
            'division_id.required' => 'Division id field is required!',
            'name.required' => 'Name field field is required!',
            'budget.required' => 'Budget field field is required!',
            // 'financial_target.required' => 'Financial target field field is required!',
            // 'financial_realization.required' => 'Financial realization field field is required!',
            // 'physical_target.required' => 'Physical target field field is required!',
            // 'physical_realization.required' => 'Physical realization field field is required!',
            'dones.*.required' => 'Dones field field is required!',
            'problems.*.required' => 'Problems field field is required!',
            'follow_up.*.required' => 'Follow up field field is required!',
            'todos.*.required' => 'Todos field field is required!',
        ]);

        // Change null value in array to "-"
        // if (Arr::last($validated['dones']) == null || Arr::last($validated['dones']) == 'null') {
        //     array_pop($validated['dones']);
        //     array_push($validated['dones'], "-");

        //     Activity::create($validated);

        //     return redirect('/app/activities');
        // }

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
            'financial_target' => 'nullable',
            'financial_realization' => 'nullable',
            'physical_target' => 'nullable',
            'physical_realization' => 'nullable',
            'dones.*' => 'required',
            'problems.*' => 'required',
            'follow_up.*' => 'required',
            'todos.*' => 'required',
        ], [
            'user_id.required' => 'User id field is required!',
            'department_id.required' => 'Department id field is required!',
            'division_id.required' => 'Division id field is required!',
            'name.required' => 'Name field field is required!',
            'budget.required' => 'Budget field field is required!',
            // 'financial_target.required' => 'Financial target field field is required!',
            // 'financial_realization.required' => 'Financial realization field field is required!',
            // 'physical_target.required' => 'Physical target field field is required!',
            // 'physical_realization.required' => 'Physical realization field field is required!',
            'dones.*.required' => 'Dones field field is required!',
            'problems.*.required' => 'Problems field field is required!',
            'follow_up.*.required' => 'Follow up field field is required!',
            'todos.*.required' => 'Todos field field is required!',
        ]);

        $activity->update($validated);

        return redirect()->to('/app/activities')->with('success', 'Kegiatan Berhasil Diupdate !');
    }

    public function destroy(Activity $activity)
    {

        Activity::destroy($activity->id);

        return redirect()->to('/app/activities/')->with('success', 'Kegiatan Berhasil Dihapus !');
    }

    public function fetchBudget(Request $request)
    {
        $activities['budget'] = Department::where('id', $request->department_id)->get(['budget']);


        return response()->json($activities);
    }
}
