<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use App\Models\AuditLog;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (AuthorizationException $e, $request) {
            AuditLog::create([
                'user_id' => auth()->id(),
                'action' => 'Unauthorized access attempt: '.$request->path(),
                'ip_address' => $request->ip(),
            ]);

            abort(403);
        });
    }
}
