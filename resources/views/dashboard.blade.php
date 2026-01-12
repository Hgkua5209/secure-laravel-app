<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('System Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Profile -->
                <a href="{{ route('profile.edit') }}"
                   class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-gray-800">Profile</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Manage your profile and password
                    </p>
                </a>

                <!-- Tasks -->
                <a href="{{ route('tasks.index') }}"
                   class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-gray-800">Tasks</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        View, create, edit, and delete tasks
                    </p>
                </a>

                <!-- Create Task -->
                <a href="{{ route('tasks.create') }}"
                   class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-gray-800">Create Task</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Add a new task securely
                    </p>
                </a>

                {{-- User Dashboard --}}
                @if(auth()->user()->role->name === 'User')
                    <a href="{{ route('user.dashboard') }}"
                    class="block p-6 bg-blue-50 rounded-lg shadow hover:shadow-md transition">
                        <h3 class="text-lg font-semibold text-gray-800">User Dashboard</h3>
                        <p class="mt-2 text-sm text-gray-600">
                            Access user-only features
                        </p>
                    </a>
                @endif

                {{-- Admin Dashboard --}}
                @if(auth()->user()->role->name === 'Admin')
                    <a href="{{ route('admin.dashboard') }}"
                    class="block p-6 bg-red-50 rounded-lg shadow hover:shadow-md transition">
                        <h3 class="text-lg font-semibold text-gray-800">Admin Dashboard</h3>
                        <p class="mt-2 text-sm text-gray-600">
                            Administrative controls
                        </p>
                    </a>
                @endif
                    <a href="{{ route('admin.logs') }}"
                        class="block p-6 bg-red-50 rounded-lg shadow hover:shadow-md transition">
                            <h3 class="text-lg font-semibold text-gray-800">Audit Logs</h3>
                            <p class="mt-2 text-sm text-gray-600">
                                View system security logs
                            </p>
                    </a>

            </div>

        </div>
    </div>
</x-app-layout>
