<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use App\Models\AuditLog;

class LogFailedLogin
{
    public function handle(Failed $event): void
    {
        AuditLog::create([
            'user_id'   => null, // user not authenticated
            'action'    => 'Failed login attempt for email: '.$event->credentials['email'],
            'ip_address'=> request()->ip(),
        ]);
    }
}
