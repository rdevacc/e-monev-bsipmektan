<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role_id')->get();

        return view('app.users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        $roles = Role::orderBy('id')->get();

        return view('app.users.create', [
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ]);

        User::create($validated);

        return redirect('/app/users');
    }

    public function edit(Request $request, User $user)
    {
        $user_id = $user->id;

        $data = User::find($user_id);
        $roles = Role::orderBy('id')->get();

        return view('app.users.edit', [
            'data' => $data,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            // 'password' => 'required',
        ]);

        $user->update($validated);

        return redirect()->to('/app/users/');
    }

    public function destroy(User $user)
    {

        User::destroy($user->id);

        return redirect()->to('/app/users');
    }
}
