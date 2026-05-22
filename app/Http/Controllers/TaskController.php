<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    // view data
    public function index() {
        $tasks = Task::orderBy("id","desc")->paginate(10);
        return view("dashboard", compact("tasks"));
    }

    //store data
    public function store(Request $request) {
        $task = Task::create([
            'label' => $request->label,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route("dashboard")->with("success","Task Successfully Created");
    }

    // view task
    public function show($id) {
        $task = Task::find($id);
        return view("view-todo", compact("task"));
    }

    // view task for edit
    public function showForEdit($id) {
        $task = Task::find($id);
        Gate::authorize("update", $task);
        return view("edit-todo", compact("task"));
    }

    // update task
    public function edit(Request $request, $id) {
        $task = Task::find($id);

        if ($request->user()->cannot('update', $task)) {
            abort(403);
        }

        // validation
        
        $task->update([
            'label' => $request->label,
            'description' => $request->description,
        ]);

        return redirect()->route('show-task', $task->id)->with('success','Edit done successfully');
    }

    //delete task
    public function destroy(Request $request, $id) {
        $task = Task::find($id);

        if ($request->user()->cannot('delete', $task)) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('dashboard')->with('success','Task deleted successfully');
    }
}
