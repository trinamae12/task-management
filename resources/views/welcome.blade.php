<x-layout>
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
</x-layout>