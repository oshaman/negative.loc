<?php

namespace Oshaman\Publication\Providers;

use Oshaman\Publication\Event;
use Oshaman\Publication\Policies\EventPolicy;

use Oshaman\Publication\Article;
use Oshaman\Publication\Policies\ArticlePolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Event::class => EventPolicy::class,
        // Permission::class => PermissionPolicy::class,
        // Menu::class => MenusPolicy::class,
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        
        Gate::define('VIEW_ADMIN', function ($user) {
        	return $user->canDo('VIEW_ADMIN', FALSE);
        });

        Gate::define('UPDATE_ARTICLES', function ($user) {
            return $user->canDo('UPDATE_ARTICLES', FALSE);
        });
        
        // Gate::define('DELETE_ARTICLES', function ($user) {
        	// return $user->canDo('DELETE_ARTICLES', FALSE);
        // });
        
        Gate::define('UPDATE_EVENTS', function ($user) {
            return $user->canDo('UPDATE_EVENTS', FALSE);
        });
        
        Gate::define('CONFIRMATION_DATA', function ($user) {
        	return $user->canDo('CONFIRMATION_DATA', FALSE);
        });
        
    }
}
