<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">

                {{-- Create Task Button --}}
                <div class="mb-4">
                    <a href="{{ route('tasks.create') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        + Create Task
                    </a>
                </div>

                {{-- Tasks Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                {{-- ADMIN ONLY --}}
                                @if(auth()->user()->role->name === 'Admin')
                                    <th class="border px-4 py-2 text-left">User</th>
                                @endif

                                <th class="border px-4 py-2 text-left">Title</th>
                                <th class="border px-4 py-2 text-left">Description</th>
                                <th class="border px-4 py-2 text-left">Status</th>
                                <th class="border px-4 py-2 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($tasks as $task)
                                <tr class="hover:bg-gray-50">

                                    {{-- ADMIN ONLY --}}
                                    @if(auth()->user()->role->name === 'Admin')
                                        <td class="border px-4 py-2">
                                            {{ $task->user->name ?? 'Unknown' }}
                                        </td>
                                    @endif

                                    <td class="border px-4 py-2">
                                        {{ $task->title }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        {{ $task->description }}
                                    </td>

                                    <td class="border px-4 py-2 capitalize">
                                        {{ $task->status }}
                                    </td>

                                    <td class="border px-4 py-2 text-center space-x-2">
                                        <a href="{{ route('tasks.edit', $task) }}"
                                           class="text-blue-600 hover:underline">
                                            Edit
                                        </a>

                                        <form action="{{ route('tasks.destroy', $task) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this task?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="border px-4 py-4 text-center text-gray-500">
                                        No tasks found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
