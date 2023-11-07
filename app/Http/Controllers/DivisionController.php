<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('name')->get();

        return view('app.divisions.index', [
            'divisions' => $divisions,
        ]);
    }

    public function create()
    {
        $departments = Department::all()->sortBy('name');

        return view('app.divisions.create', [
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'head_name' => 'required',
            'department_id' => 'required',
        ]);

        Division::create($validated);

        return redirect('/app/divisions');
    }

    public function edit(Request $request, Division $division)
    {
        $division_id = $division->id;
        $departments = Department::orderBy('name')->get();

        $data = Division::find($division_id);

        return view('app.divisions.edit', [
            'data' => $data,
            'departments' => $departments,
        ]);
    }

    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required',
            'head_name' => 'required',
            'department_id' => 'required',
        ]);

        $division->update($validated);

        return redirect()->to('/app/divisions');
    }

    public function destroy(Division $division)
    {

        Division::destroy($division->id);

        return redirect()->to('/app/divisions');
    }
}
