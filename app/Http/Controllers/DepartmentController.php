<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();


        return view('app.departments.index', [
            'departments' => $departments,
        ]);
    }

    public function create()
    {

        return view('app.departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'head_name' => 'required',
            'budget' => 'required',
        ]);

        Department::create($validated);

        return redirect('/app/departments');
    }

    public function edit(Request $request, Department $department)
    {
        $department_id = $department->id;

        $data = Department::find($department_id);

        return view('app.departments.edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required',
            'head_name' => 'required',
            'budget' => 'required',
        ]);

        $department->update($validated);

        return redirect()->to('/app/departments');
    }

    public function destroy(Department $department)
    {

        Department::destroy($department->id);

        return redirect()->to('/app/departments');
    }
}
