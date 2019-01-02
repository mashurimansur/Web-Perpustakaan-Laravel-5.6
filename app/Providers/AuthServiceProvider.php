<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerRole();

        //
    }

    public function registerRole(){
        Gate::define('admin_dashboard', function($user){
            return $user->hasAccess(['admin_dashboard']);
        });
        Gate::define('admin_buku', function($user){
            return $user->hasAccess(['admin_buku']);
        });
        Gate::define('admin_transaksi', function($user){
            return $user->hasAccess(['admin_transaksi']);
        });
        Gate::define('admin_member', function($user){
            return $user->hasAccess(['admin_member']);
        });
        Gate::define('user_transaksi', function($user){
            return $user->hasAccess(['user_transaksi']);
        });
        Gate::define('user_setting', function($user){
            return $user->hasAccess(['user_setting']);
        });
    }
}
