<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('users')->get();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        $users = User::all();
        return view('groups.create', compact('users'));
    }

    public function store(Request $request)
    {
        $group = Group::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if ($request->has('users')) {
            $group->users()->attach($request->users);
        }

        return redirect()->route('groups.index');
    }
    public function edit(Group $group)
    {
        $users = User::all();
        $group->load('users');

        return view('groups.edit', compact('group', 'users'));
    }
    public function update(Request $request, Group $group)
    {
        $group->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $group->users()->sync($request->users ?? []);

        return redirect()->route('groups.index');
    }
    public function destroy(Group $group)
    {
        $group->users()->detach();
        $group->delete();

        return redirect()->route('groups.index');
    }
}
