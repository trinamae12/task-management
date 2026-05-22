<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
        <a href="{{ route('add-to-do') }}" class="btn btn-primary btn-lg me-2">Add to-do list</a>
    <div class="container mt-5">
        <div class="row">
            <h3>To-do List</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Task Description</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->label }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->status->label() }}</td>
                            <td>
                                <a href="{{ route('show-task', $task->id) }}">View</a>
                                <form action="{{ route('delete-task', $task->id) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
