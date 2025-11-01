<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupCategory;
use App\Models\GroupPriority;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = auth()->user()->groups()->orderBy('priority_id', 'desc')->get();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        $priorities = GroupPriority::all();
        $categories = GroupCategory::all();
        return view('groups.create', compact('priorities', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'description' => 'required|string|max:500',
            'category_id' => 'required|exists:group_categories,id',
            'priority_id' => 'required|exists:group_priorities,id',
        ]);

        $validated['user_id'] = auth()->id();

        Group::create($validated);

        return redirect()->route('groups.index')->with('succes', 'Grupo creado exitosamente.');
    }

    public function edit(Group $group)
    {
        $priorities = GroupPriority::all();
        $categories = GroupCategory::all();
        return view('groups.edit', compact('group', 'priorities', 'categories'));
    }

    public function update(Request $request, Group $group)
    {
        if($group->user_id !== auth()->id()){
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'description' => 'required|string|max:500',
            'category_id' => 'required|exists:group_categories,id',
            'priority_id' => 'required|exists:group_priorities,id',
        ]);

        $group->update($validated);

        return redirect()->route('groups.index')->with('succes', 'Grupo actualizado exitosamente.');
    }

    public function destroy(Group $group)
    {
        if($group->user_id !== auth()->id())
        {
            abort(403);
        }

        $group->delete();

        return redirect()->route('groups.index')->with('succes', 'Grupo eliminado exitosamente.');
    }

}
