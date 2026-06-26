{{-- Error Reporting Alert Banner --}}
@if ($errors->any())
    <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4 text-red-700">
        <p class="font-bold">Please correct the following errors:</p>
        <ul class="list-disc list-inside mt-1 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- ADMIN ONLY: Task Assignment Dropdown --}}
@if(auth()->user()->role && auth()->user()->role->name === 'Admin' && isset($users))
    <div class="mb-4">
        <label class="block font-medium text-gray-700">Assign User <span class="text-red-500">*</span></label>
        <select
            name="user_id"
            required
            class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
        >
            <option value="" disabled {{ !isset($task) ? 'selected' : '' }}>-- Select User --</option>
            @foreach($users as $u)
                <option value="{{ $u->id }}"
                    {{ old('user_id', $task->user_id ?? '') == $u->id ? 'selected' : '' }}>
                    {{ $u->name }} ({{ $u->email }})
                </option>
            @endforeach
        </select>
    </div>
@endif

{{-- Title Input --}}
<div class="mb-4">
    <label class="block font-medium text-gray-700">Title</label>
    <input
        type="text"
        name="title"
        value="{{ old('title', $task->title ?? '') }}"
        required
        maxlength="255"
        class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
    >
</div>

{{-- Description Area --}}
<div class="mb-4">
    <label class="block font-medium text-gray-700">Description</label>
    <textarea
        name="description"
        required
        rows="4"
        class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
    >{{ old('description', $task->description ?? '') }}</textarea>
</div>

{{-- Timestamps: Start Date & End Date (Deadline) --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block font-medium text-gray-700">Start Date & Time</label>
        <input
            type="datetime-local"
            name="start_date"
            value="{{ old('start_date', isset($task->start_date) ? \Carbon\Carbon::parse($task->start_date)->format('Y-m-d\TH:i') : '') }}"
            class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
        >
    </div>

    <div>
        <label class="block font-medium text-gray-700">End Date & Time (Deadline)</label>
        <input
            type="datetime-local"
            name="end_date"
            value="{{ old('end_date', isset($task->end_date) ? \Carbon\Carbon::parse($task->end_date)->format('Y-m-d\TH:i') : '') }}"
            class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
        >
    </div>
</div>

{{-- ADMIN ONLY: Task Status Management Dropdown (Visible only when editing an existing task) --}}
@if(auth()->user()->role && auth()->user()->role->name === 'Admin' && isset($task))
    <div class="mb-4">
        <label class="block font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
        <select
            name="status"
            required
            class="w-full border rounded p-2 focus:ring focus:ring-blue-200"
        >
            <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>
                Pending
            </option>
            <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>
                Completed
            </option>
        </select>
    </div>
@endif

{{-- Submit Button Layout --}}
<button
    type="submit"
    class="mt-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition font-semibold shadow"
>
    {{ $buttonText }}
</button>
