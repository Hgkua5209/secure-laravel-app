<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Failed;
use App\Models\AuditLog;

class LogFailedLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

    public function handle(Failed $event): void
        {
            $ip = request()->ip();

            // Log every failed login attempt
            AuditLog::create([
                'user_id' => $event->user?->id,
                'action' => 'Failed login attempt for email: '.$event->credentials['email'],
                'ip_address' => $ip,
            ]);

            // Count failed attempts per IP
            $attempts = cache()->increment('login_fail_'.$ip);

            // Optional: expire counter after 10 minutes
            cache()->put('login_fail_'.$ip, $attempts, now()->addMinutes(10));

            // Detect possible brute-force
            if ($attempts >= 5) {
                AuditLog::create([
                    'user_id' => null,
                    'action' => 'Possible brute-force attack detected',
                    'ip_address' => $ip,
                ]);
            }
        }
}
