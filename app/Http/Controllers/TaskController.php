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
        $tasks = Task::with(['status'], ['priority'])->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $statuses = TaskStatus::all();
        $priorities = TaskPriority::all();
        return view('tasks.create', compact('statuses', 'priorities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:500',
            'deadline' => 'nullable|date',
            'status_id' => 'required|exists:task_statuses,id',
            'priority_id' => 'required|exists:task_priorities,id',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('succes', 'Tarea creada exitosamente.');
    }

    public function edit(Task $task)
    {
        $statuses = TaskStatus::all();
        $priorities = TaskPriority::all();
        return view('tasks.edit', compact('task', 'statuses', 'priorities'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:500',
            'deadline' => 'nullable|date',
            'status_id' => 'required|exists:task_statuses,id',
            'priority_id' => 'required|exists:task_priorities,id',
        ]);

        $task->update(attributes: $validated);

        return redirect()->route('tasks.index')->with('succes', 'Tarea actualizada exitosamente.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('succes', 'Tarea eliminada exitosamente.');
    }

}
