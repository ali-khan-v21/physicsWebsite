<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ArticlePolicy::class => Article::class,
        ProfilePolicy::class => Profile::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('is_admin', function ($user) {
            if ($user->role->role_value <= 2) {
                return true;
            } else {
                return false;
            }
        });
        Gate::define('edit_role', function ($user, $role_user, $role) {
            // dd($user, $role_user, $role);
            if($role_user->role->role_value<=2){
                return false;# cant change role of an admin
            }
            if($user->role->role_value > 2){
                return false;# if not an admin
            }
            if ($role->role_value <= 2) {
                return false;# cant assign admin role
            }

            return true;
        });
        Gate::define('admin-dashboard',function($user){
            if($user->role->role_value<=3){
                return true;
            }else{
                return false;
            }
        });

    }
}
