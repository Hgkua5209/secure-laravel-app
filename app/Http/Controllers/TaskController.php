<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\AuditLog;

class TaskController extends Controller
{
    // READ ALL TASKS
    public function index()
    {
        $user = auth()->user();

        // System logging
        AuditLog::create([
            'user_id' => $user->id,
            'task_id' => null,
            'action' => 'Accessed Task List View',
            'ip_address' => request()->ip(),
        ]);

        // Look directly at your explicit role relationship from your SQL schema
        if ($user->role && $user->role->name === 'Admin') {
            // Admin can view tasks across all users
            $tasks = Task::with('user')->get();
        } else {
            // Standard users only see tasks assigned to them
            $tasks = Task::where('user_id', $user->id)->get();
        }

        return view('tasks.index', compact('tasks'));
    }

    // DISPLAY TASK CREATION FORM
    public function create()
    {
        $user = auth()->user();
        $users = [];

        // Fetch user records to populate the assignment dropdown if Admin
        if ($user->role && $user->role->name === 'Admin') {
            $users = \App\Models\User::all();
        }

        return view('tasks.create', compact('users'));
    }

    // PROCESS TASK STORAGE
    public function store(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'title' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s.,!?-]+$/'],
            'description' => ['required', 'string', 'max:1000', 'regex:/^[a-zA-Z0-9\s.,!?-]+$/'],
        ];

        // Conditional structural rules for Admin features
        $isAdmin = ($user->role && $user->role->name === 'Admin');
        if ($isAdmin) {
            $rules['user_id'] = 'required|exists:users,id';
            $rules['start_date'] = 'nullable|date';
            $rules['end_date'] = 'nullable|date|after_or_equal:start_date';
        }

        $request->validate($rules);

        // Map assigned owner matching requirement
        $assignedUserId = $isAdmin ? $request->user_id : $user->id;

        $taskData = [
            'user_id'     => $assignedUserId,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => 'pending',
        ];

        if ($isAdmin) {
            $taskData['start_date'] = $request->start_date;
            $taskData['end_date']   = $request->end_date;
        }

        $newTask = Task::create($taskData);

        AuditLog::create([
            'user_id' => $user->id,
            'task_id' => $newTask->id,
            'action' => 'Created Task ID ' . $newTask->id . ($isAdmin ? ' and assigned to User ID ' . $assignedUserId : ''),
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // UPDATE (form)
    public function edit(Task $task)
    {
        $user = auth()->user();
        $this->authorize('update', $task);

        $users = [];
        // FIXED: Swapped out Spatie helper for custom DB column check
        if ($user->role && $user->role->name === 'Admin') {
            $users = \App\Models\User::all();
        }

        return view('tasks.edit', compact('task', 'users'));
    }

    // UPDATE (save)
    public function update(Request $request, Task $task)
    {
        $user = auth()->user();

        // Prevent IDOR via Policy Authorization Gateway
        $this->authorize('update', $task);

        $rules = [
            'title' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s.,!?-]+$/'
            ],
            'description' => [
                'required',
                'string',
                'max:1000',
                'regex:/^[a-zA-Z0-9\s.,!?-]+$/'
            ],
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];

        // FIXED: Swapped out Spatie helper for custom DB column check
        $isAdmin = ($user->role && $user->role->name === 'Admin');
        if ($isAdmin) {
            $rules['user_id'] = 'required|exists:users,id'; // Admin can re-assign tasks
            $rules['status'] = 'required|in:pending,completed';
        }

        $request->validate($rules);

        $data = $request->only('title', 'description', 'start_date', 'end_date');

        if ($isAdmin) {
            $data['user_id'] = $request->user_id; // Saves task assignment modifications
            $data['status']  = $request->status;  // Restores saving user task status updates!
        }

        $task->update($data);

        AuditLog::create([
            'user_id' => $user->id,
            'task_id' => $task->id,
            'action' => 'Updated Task ID ' . $task->id . ($isAdmin ? ' (Admin modifications applied)' : ''),
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    // DELETE
    public function destroy(Task $task)
    {
        // Prevent IDOR using policy
        $this->authorize('delete', $task);

        $taskId = $task->id; // Hold reference cache prior to running record drop
        $task->delete();

        AuditLog::create([
            'user_id' => auth()->id(),
            'task_id' => null, // Left null since matching foreign entity cascades out
            'action' => 'Deleted Task ID ' . $taskId,
            'ip_address' => request()->ip(),
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
