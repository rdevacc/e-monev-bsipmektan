<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function index()
    {
        $admin_users = User::orderBy('role_id')->get();
        $users = User::where('role_id', '!=', 1)->get();

        return view('app.users.index', [
            'admin_users' => $admin_users,
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

    public function edit(User $user)
    {
        $user_id = $user->id;

        $path_admin = "app/users/1/edit";

        if (request()->path() == $path_admin && auth()->user()->id != 1) {
            abort(401);
        }

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
