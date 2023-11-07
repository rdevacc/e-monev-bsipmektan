<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isSuperAdmin', function ($user) {
            return $user->role->name == 'SuperAdmin';
        });

        Gate::define('isAdmin', function (User $user) {
            return $user->role->name == 'Admin';
        });

        Gate::define('superAdminAndAdmin', function (User $user) {
            return ($user->role->name == 'SuperAdmin' || $user->role->name == 'Admin');
        });

        Gate::define('isPJ', function (User $user) {
            return $user->role->name == 'PJ';
        });

        Gate::define('PJ-Dashboard', function (User $user, Activity $activity) {
            return $user->id === $activity->user_id;
        });

        Gate::define('update-activity', function (User $user, Activity $activity) {
            return ($user->role->name == 'SuperAdmin' || $user->role->name == 'Admin' || $user->id == $activity->user_id);
        });

        Gate::define('delete-activity', function (User $user) {
            return $user->role->name == 'SuperAdmin' || $user->role->name == 'Admin';
        });
    }
}
