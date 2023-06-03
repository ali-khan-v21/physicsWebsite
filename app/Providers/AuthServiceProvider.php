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
        ArticlePolicy::class=>Article::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('is_admin',function($user){
            if($user->role->role_value<=2){
                return true;

            }else{
                return false;
            }

        });
    }
}
