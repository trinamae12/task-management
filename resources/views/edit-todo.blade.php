<x-app-layout title="Add To Do">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Update To-Do Task</h4>
        </div>

        <div class="card-body">
            <form action="#" method="POST">
                @csrf

                <!-- Task Title -->
                <div class="mb-3">
                    <label class="form-label">Task Title</label>
                    <input 
                        type="text" 
                        name="label" 
                        class="form-control" 
                        value="{{ $task->label }}"
                        required
                    >
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea 
                        name="description" 
                        class="form-control" 
                        rows="3" 
                    >{{ $task->description }}</textarea>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-success">
                    Update Task
                </button>

                <a href="{{ route('show-task', $task->id) }}" class="btn btn-secondary">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</div>
</x-app-layout>