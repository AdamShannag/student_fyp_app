<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

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

        Gate::define('list-projects', function (User $user) {
            return $user->userLevel > 0;
        });
        Gate::define('edit-project', function (User $user) {
            return $user->userLevel > 0;
        });
        Gate::define('update-project', function (User $user) {
            return $user->userLevel > 0;
        });
        Gate::define('show-project', function (User $user) {
            return $user->userLevel > 0;
        });
        Gate::define('projects', function (User $user) {
            return $user->userLevel < 3;
        });

        Gate::define('lecturers', function (User $user) {
            return $user->userLevel === 1;
        });

        Gate::define('students', function (User $user) {
            return $user->userLevel === 1;
        });
    }
}
