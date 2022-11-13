<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Comment;
use App\Models\Publication;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        /*detalle publicacion*/
        Gate::define('publication.tasks', function (User $user, Publication $publication) {
            return auth()->check() && ($publication->user_id == auth()->id() || auth()->user()->role_id == Role::is_admin);
        });

        /*detalle servicio*/
        Gate::define('service.tasks', function (User $user, Service $service) {
            return auth()->check() && ($service->user_id == auth()->id() || auth()->user()->role_id == Role::is_admin);
        });
        
    }
}
