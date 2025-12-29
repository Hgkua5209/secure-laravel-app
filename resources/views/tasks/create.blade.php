<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Create Task
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                @include('tasks._form', [
                    'task' => null,
                    'buttonText' => 'Create Task'
                ])
            </form>
        </div>
    </div>
</x-app-layout>
