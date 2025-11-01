<?php

namespace App\Http\Controllers;

use App\Models\TaskPriority;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->orderBy('priority_id', 'desc')->orderBy('status_id', 'asc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $statuses = TaskStatus::all();
        $priorities = TaskPriority::all();
        $groups = auth()->user()->groups()->get();
        return view('tasks.create', compact('statuses', 'priorities', 'groups'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:500',
            'deadline' => 'nullable|date',
            'status_id' => 'required|exists:task_statuses,id',
            'priority_id' => 'required|exists:task_priorities,id',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        $validated['user_id'] = auth()->id();

        Task::create($validated);

        return redirect()->route('tasks.index')->with('succes', 'Tarea creada exitosamente.');
    }

    public function edit(Task $task)
    {
        $statuses = TaskStatus::all();
        $priorities = TaskPriority::all();
        $groups = auth()->user()->groups()->get();
        return view('tasks.edit', compact('task', 'statuses', 'priorities', 'groups'));
    }

    public function update(Request $request, Task $task)
    {

        if($task->user_id !== auth()->id()){
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:500',
            'deadline' => 'nullable|date',
            'status_id' => 'required|exists:task_statuses,id',
            'priority_id' => 'required|exists:task_priorities,id',
            'group_id' => 'nullable|exists:groups,id'
        ]);

        $task->update(attributes: $validated);

        return redirect()->route('tasks.index')->with('succes', 'Tarea actualizada exitosamente.');
    }

    public function destroy(Task $task)
    {

        if($task->user_id !== auth()->id()){
            abort(403);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('succes', 'Tarea eliminada exitosamente.');
    }

}
