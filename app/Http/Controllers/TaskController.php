<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        $totalHours = Task::sum('total_hours');
        return view('tasks.index', compact('tasks', 'totalHours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $workedMinutes = (strtotime($request->input('exit_time')) - strtotime($request->input('entry_time'))) / 60;
        $totalHours = ($workedMinutes - $request->input('break_minutes')) / 60 + $request->input('extra_hours');

        $task = new Task();
        $task->task_date     = $request->input('task_date');
        $task->entry_time    = $request->input('entry_time');
        $task->exit_time     = $request->input('exit_time');
        $task->break_minutes = $request->input('break_minutes');
        $task->extra_hours   = $request->input('extra_hours');
        $task->total_hours   = round($totalHours, 2);
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $workedMinutes = (strtotime($request->input('exit_time')) - strtotime($request->input('entry_time'))) / 60;
        $totalHours = ($workedMinutes - $request->input('break_minutes')) / 60 + $request->input('extra_hours');

        $task->task_date     = $request->input('task_date');
        $task->entry_time    = $request->input('entry_time');
        $task->exit_time     = $request->input('exit_time');
        $task->break_minutes = $request->input('break_minutes');
        $task->extra_hours   = $request->input('extra_hours');
        $task->total_hours   = round($totalHours, 2);
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
