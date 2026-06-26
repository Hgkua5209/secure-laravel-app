<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    /**
     * Show the letterhead report filter form and, once "generate" is
     * submitted, the generated report itself (tasks + audit log activity
     * for the selected user / date range).
     */
    public function index(Request $request)
    {
        $admin = auth()->user();

        // Security Fallback: directly check the DB relation attribute column,
        // consistent with the rest of the admin area (see AuditLogController).
        if (!$admin || !$admin->role || $admin->role->name !== 'Admin') {
            abort(403, 'This action is unauthorized.');
        }

        $users = User::orderBy('name')->get();

        $generated    = $request->boolean('generate');
        $tasks        = collect();
        $logs         = collect();
        $selectedUser = null;
        $dateFrom     = null;
        $dateTo       = null;
        $taskStats    = ['total' => 0, 'pending' => 0, 'in_progress' => 0, 'completed' => 0];

        if ($generated) {
            $validated = $request->validate([
                'user_id'   => 'nullable|exists:users,id',
                'date_from' => 'nullable|date',
                'date_to'   => 'nullable|date|after_or_equal:date_from',
            ]);

            $userId   = $validated['user_id'] ?? null;
            $dateFrom = $validated['date_from'] ?? null;
            $dateTo   = $validated['date_to'] ?? null;

            if ($userId) {
                $selectedUser = $users->firstWhere('id', (int) $userId);
            }

            $taskQuery = Task::with('user')->orderBy('created_at');
            $logQuery  = AuditLog::with(['user', 'task'])->orderBy('created_at');

            if ($userId) {
                $taskQuery->where('user_id', $userId);
                $logQuery->where('user_id', $userId);
            }

            if ($dateFrom) {
                $from = Carbon::parse($dateFrom)->startOfDay();
                $taskQuery->where('created_at', '>=', $from);
                $logQuery->where('created_at', '>=', $from);
            }

            if ($dateTo) {
                $to = Carbon::parse($dateTo)->endOfDay();
                $taskQuery->where('created_at', '<=', $to);
                $logQuery->where('created_at', '<=', $to);
            }

            $tasks = $taskQuery->get();
            $logs  = $logQuery->get();

            $taskStats['total']       = $tasks->count();
            $taskStats['pending']     = $tasks->where('status', 'pending')->count();
            $taskStats['in_progress'] = $tasks->where('status', 'in_progress')->count();
            $taskStats['completed']   = $tasks->where('status', 'completed')->count();

            // Record that this report was generated, same pattern used
            // elsewhere in the app for security-relevant actions.
            AuditLog::create([
                'user_id'    => $admin->id,
                'task_id'    => null,
                'action'     => 'Generated Letterhead Report'
                    . ($selectedUser ? ' for User ID ' . $selectedUser->id : ' for All Users')
                    . ($dateFrom || $dateTo ? ' (' . ($dateFrom ?: 'start') . ' to ' . ($dateTo ?: 'now') . ')' : ''),
                'ip_address' => $request->ip(),
            ]);
        }

        return view('admin.reports.letterhead', [
            'users'        => $users,
            'generated'    => $generated,
            'tasks'        => $tasks,
            'logs'         => $logs,
            'selectedUser' => $selectedUser,
            'dateFrom'     => $dateFrom,
            'dateTo'       => $dateTo,
            'taskStats'    => $taskStats,
        ]);
    }
}
