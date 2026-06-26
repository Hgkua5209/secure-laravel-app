<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\AuditLog;
use App\Policies\TaskPolicy;
use App\Policies\AuditLogPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Task::class => TaskPolicy::class,
        AuditLog::class => AuditLogPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        // Transparently authorize Admin column type values
        Gate::before(function ($user, $ability) {
            if ($user->role && $user->role->name === 'Admin') {
                return true;
            }
        });
    }
}
