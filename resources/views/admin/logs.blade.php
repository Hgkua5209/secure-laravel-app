<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Audit Logs
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow">

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">User</th>
                            <th class="border px-4 py-2">Action</th>
                            <th class="border px-4 py-2">IP Address</th>
                            <th class="border px-4 py-2">Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($logs as $log)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">
                                    {{ $log->user->name ?? 'System' }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $log->action }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $log->ip_address }}
                                </td>

                                <td class="border px-4 py-2">
                                    {{ $log->created_at->format('d M Y, h:i A') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"
                                    class="border px-4 py-4 text-center text-gray-500">
                                    No logs available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
