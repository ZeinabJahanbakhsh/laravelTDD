<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <table class="min-w-full table-auto">
                    <thead class="justify-between">
                    <tr class="bg-gray-800">
                        <th class="px-16 py-2">
                            <span class="text-gray-300">ID</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-300">Title</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-300">Descriptions</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-gray-200">
                        <tr class="bg-white border-4 border-gray-200">

                            <td class="px-16 py-2 flex-row items-center"> {{ $task->id }} </td>
                            <td>
                                <span class="text-center ml-2 font-semibold">{{ $task->title }}</span>
                            </td>
                            <td class="px-16 py-2">
                                    <span>
                                        {{ $task->description }}
                                    </span>
                            </td>

                        </tr>

                    </tbody>
                </table>

            </div>
        </div>

    </div>

</x-app-layout>
