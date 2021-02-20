<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tasks') }}
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
                            <th class="px-16 py-2">
                                <span class="text-gray-300">Display</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-gray-300">Edit</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-gray-300">Delete</span>
                            </th>
                        </tr>
                        </thead>
                    <tbody class="bg-gray-200">

                        @foreach($allTask as $task)

                            <tr class="bg-white border-4 border-gray-200">

                                <td class="px-16 py-2 flex-row items-center"> {{ $task->id }} </td>
                                <td>
                                    <span class="text-center ml-2 font-semibold">{{ $task->title }}</span>
                                </td>
                                <td class="px-16 py-2">
                                    <span>
                                        {{ $task->excerpt() }}
                                    </span>
                                </td>
                                <td class="px-12 py-2 flex-row items-center">
                                    <button
                                        class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                                        <a href="{{ url('tasks',[$task->id]) }}">Show</a>
                                    </button>
                                </td>
                                <td class="px-12 py-2 flex-row items-center">
                                    <button
                                        class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                                        <a href="{{ url('tasks/edit',[$task->id]) }}">Edit</a>
                                    </button>
                                </td>
                                <td class="px-12 py-2 flex-row items-center">
                                    <form style="float:right" method="POST" action="/tasks/delete/{{$task->id}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}

                                         <button class="bg-indigo-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black " type="submit">Delete</button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                    </table>

            </div>
        </div>

    </div>

</x-app-layout>
