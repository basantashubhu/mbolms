<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Gate::define('view-admin-dashboard', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('view-pending-requests', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('approve-pending-requests', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('view-loans', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('add-loans', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('store-loans', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('view-users', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('view-loan-requests', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('approve-loan-requests', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('view-transactions', function (User $user) {
            return $user->is_active;
        });
        Gate::define('filter-transactions', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('view-all-transactions', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('view-user-loans', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('view-my-loans', function (User $user) {
            return !$user->is_admin && $user->is_active;
        });
        Gate::define('view-all-loans', function (User $user) {
            return !!$user->is_admin;
        });
        Gate::define('pay-loan', function (User $user) {
            return !$user->is_admin && $user->is_active;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
