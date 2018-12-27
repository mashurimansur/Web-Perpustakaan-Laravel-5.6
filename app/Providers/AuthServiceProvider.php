<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

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
        Gate::define('admin', function($user){
            if ($user->id_role == 1) {
                return true;
            } else {
                return abort(404);
            }
            // return $user->id_role->permissions->hasAccess(['admin']);
        });
        Gate::define('user', function($user){
            if ($user->id_role == 3) {
                return true;
            } else {
                return abort(404);
            };
        });
    }
}
