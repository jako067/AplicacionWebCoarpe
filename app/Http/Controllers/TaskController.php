<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        // Sumatorios agregados independientes para el recuento global
        $totalHours = Task::sum('total_hours');
        $totalExtraHours = Task::sum('extra_hours');

        return view('tasks.index', compact('tasks', 'totalHours', 'totalExtraHours'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        // Cálculo de minutos trabajados ordinarios basados en marcas de tiempo
        $workedMinutes = (strtotime($request->input('exit_time')) - strtotime($request->input('entry_time'))) / 60;

        // Normalización de entradas numéricas para prevenir errores de tipo
        $breakMinutes = (int) $request->input('break_minutes', 0);
        $extraHours = (float) $request->input('extra_hours', 0);

        // Ecuación de jornada: Horas ordinarias netas más horas extra
        $totalHours = (($workedMinutes - $breakMinutes) / 60) + $extraHours;

        $task = new Task();
        $task->task_date     = $request->input('task_date');
        $task->entry_time    = $request->input('entry_time');
        $task->exit_time     = $request->input('exit_time');
        $task->break_minutes = $breakMinutes;
        $task->extra_hours   = $extraHours;
        $task->total_hours   = round($totalHours, 2);
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $workedMinutes = (strtotime($request->input('exit_time')) - strtotime($request->input('entry_time'))) / 60;
        $breakMinutes = (int) $request->input('break_minutes', 0);
        $extraHours = (float) $request->input('extra_hours', 0);

        $totalHours = (($workedMinutes - $breakMinutes) / 60) + $extraHours;

        $task->task_date     = $request->input('task_date');
        $task->entry_time    = $request->input('entry_time');
        $task->exit_time     = $request->input('exit_time');
        $task->break_minutes = $breakMinutes;
        $task->extra_hours   = $extraHours;
        $task->total_hours   = round($totalHours, 2);
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
