<?php

namespace App\Providers;

use App\Comment;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            foreach($user->roles as $role){
                return $role->name === 'admin';
            }
        });
        Gate::define('isTutor', function($user) {
            foreach($user->roles as $role){
                return $role->name === 'normal_user';
            }
        });
       
        // $user = Auth::user();
        // if (Gate::forUser($user)->allows('up-de-comment', $post)) {
            
        // }
    }
}
