<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isULecturer', function($user) {
            return $user->role == 'lecturer';
        });
        Gate::define('isUDepartment', function($user) {
            return $user->role == 'department';
        });
        Gate::define('isUSuper', function($user) {
            return $user->role == 'super';
        });
        Gate::define('isUStudent', function($user) {
            return $user->role == 'student';
        });
    }
}
