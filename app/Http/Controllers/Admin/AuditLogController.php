<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;

class AuditLogController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Security Fallback: Directly check the DB relation attribute column
        // right here to completely bypass any hidden Spatie Interceptor issues.
        if (!$user || !$user->role || $user->role->name !== 'Admin') {
            abort(403, 'This action is unauthorized.');
        }

        // Fetch logs with users cleanly
        $logs = AuditLog::with('user')
            ->latest()
            ->get();

        // FIX: Match your actual view filename 'logs.blade.php'
        return view('admin.logs', compact('logs'));
    }
}
