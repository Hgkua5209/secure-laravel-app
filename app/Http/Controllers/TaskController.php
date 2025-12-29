<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\AuditLog;

class TaskController extends Controller
{
    // READ
    public function index(Task $task)
    {
        $user = auth()->user();

        // Audit log
        AuditLog::create([
            'user_id' => $user->id,
            'task_id' => $task->id,
            'action' => 'Accessed Task List'. $task->id,
            'ip_address' => request()->ip(),
        ]);

        // RBAC
        if ($user->role->name === 'Admin') {
            // Admin sees all tasks + users
            $tasks = Task::with('user')->get();
        } else {
            // User sees only their tasks
            $tasks = Task::where('user_id', $user->id)->get();
        }

        return view('tasks.index', compact('tasks'));
    }

    // CREATE (form)
    public function create()
    {
        return view('tasks.create');
    }

    // CREATE (store)
    public function store(Request $request,  Task $task)
    {
        $request->validate([
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
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        AuditLog::create([
            'user_id' => auth()->id(),
            'task_id' => $task->id,
            'action' => 'Created Task'. $task->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('tasks.index')
        ->with('success', 'Task created successfully.');
    }

    // UPDATE (form)
    public function edit(Task $task)
    {
        $user = auth()->user();

        // Prevent IDOR
        $this->authorize('update', $task);


        return view('tasks.edit', compact('task'));
    }

    // UPDATE (save)
public function update(Request $request, Task $task)
{
    $user = auth()->user();

    // Prevent IDOR
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
];

if ($user->role->name === 'Admin') {
    $rules['status'] = 'required|in:pending,completed';
}

$request->validate($rules);

$data = $request->only('title', 'description');

if ($user->role->name === 'Admin') {
    $data['status'] = $request->status;
}

$task->update($data);


    AuditLog::create([
        'user_id' => $user->id,
        'task_id' => $task->id,
        'action' => 'Updated Task ID ' . $task->id,
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

            AuditLog::create([
                'user_id' => auth()->id(),
                'task_id' => $task->id,
                'action' => 'Deleted Task ID '.$task->id,
                'ip_address' => request()->ip(),
            ]);

            $task->delete();

            return redirect()
                ->route('tasks.index')
                ->with('success', 'Task deleted successfully.');
        }

}
