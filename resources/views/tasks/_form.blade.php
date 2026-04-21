{{-- Validation Errors --}}
@if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Title --}}
<div>
    <label class="block font-medium">Title</label>
    <input
        type="text"
        name="title"
        value="{{ old('title', $task->title ?? '') }}"
        required
        maxlength="255"
        class="w-full border rounded p-2"
    >
</div>

{{-- Description --}}
<div class="mt-4">
    <label class="block font-medium">Description</label>
    <textarea
        name="description"
        required
        rows="4"
        class="w-full border rounded p-2"
    >{{ old('description', $task->description ?? '') }}</textarea>
</div>

@isset($task)
    {{-- Start Date --}}
    <div class="mt-4">
        <label class="block font-medium">Start Date</label>
        <input
            type="datetime-local"
            name="start_date"
            value="{{ old('start_date', $task->start_date ? \Carbon\Carbon::parse($task->start_date)->format('Y-m-d\TH:i') : '') }}"
            class="w-full border rounded p-2"
        >
    </div>

    {{-- End Date --}}
    <div class="mt-4">
        <label class="block font-medium">End Date</label>
        <input
            type="datetime-local"
            name="end_date"
            value="{{ old('end_date', $task->end_date ? \Carbon\Carbon::parse($task->end_date)->format('Y-m-d\TH:i') : '') }}"
            class="w-full border rounded p-2"
        >
    </div>
@endisset

@isset($task)
    @if(auth()->user()->role->name === 'Admin')
        <div class="mt-4">
            <label class="block font-medium">Status</label>
            <select
                name="status"
                class="w-full border rounded p-2"
            >
                <option value="pending"
                    {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="completed"
                    {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>
    @endif
@endisset


{{-- Submit Button --}}
<button
    type="submit"
    class="mt-4 bg-blue-600 text-white px-4 py-2 rounded"
>
    {{ $buttonText }}
</button>
