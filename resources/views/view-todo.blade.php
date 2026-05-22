<x-app-layout title="View To Do">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>View To-Do Task</h4>
            <p><a href="{{ route('show-edit-task', $task->id) }}">Edit To-Do</a></p>    
        </div>

        <div class="card-body">
            <h2>{{ $task->label }}</h2>
            <p>{{ $task->description }}</p>
            <p>Status: {{ $task->status->label() }}</p>
        </div>
    </div>
</div>
</x-app-layout>