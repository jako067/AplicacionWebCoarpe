<?php

namespace App\Http\Controllers;

use App\Models\DailyWork;
use Illuminate\Http\Request;
use App\Http\Requests\DailyWorkRequest;
use App\Models\Group;

class DailyWorkController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::all();

        $dailyWorks = DailyWork::with('group');

        if ($request->filled('group_id')) {
            $dailyWorks->where('group_id', $request->group_id);
        }

        if ($request->filled('date')) {
            $dailyWorks->whereDate('date', $request->date);
        }

        $dailyWorks = $dailyWorks->get();

        return view('daily_work.index', compact('dailyWorks', 'groups'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('daily_work.create', compact('groups'));
    }

    public function store(DailyWorkRequest $request)
    {
        $dailyWork = new DailyWork();
        $dailyWork->group_id = $request->input('group_id');
        $dailyWork->date = $request->input('date');
        $dailyWork->reporte = $request->input('reporte');
        $dailyWork->evaluation = $request->input('evaluation');
        $dailyWork->incidences = $request->input('incidences');
        $dailyWork->save();

        return redirect()->route('daily_work.index');
    }

    public function show($id)
    {
        $dailyWork = DailyWork::with('group')->findOrFail($id);
        return view('daily_work.show', compact('dailyWork'));
    }

    public function edit($id)
    {
        $dailyWork = DailyWork::findOrFail($id);
        $groups = Group::all();

        return view('daily_work.edit', compact('dailyWork', 'groups'));
    }

    public function update(DailyWorkRequest $request, $id)
    {
        $dailyWork = DailyWork::findOrFail($id);

        $dailyWork->group_id = $request->input('group_id');
        $dailyWork->date = $request->input('date');
        $dailyWork->reporte = $request->input('reporte');
        $dailyWork->evaluation = $request->input('evaluation');
        $dailyWork->incidences = $request->input('incidences');

        $dailyWork->save();

        return redirect()->route('daily_work.index');
    }

    public function destroy($id)
    {
        $dailyWork = DailyWork::findOrFail($id);
        $dailyWork->delete();

        return redirect()->route('daily_work.index');
    }
    public function fetch(Request $request)
    {
        $dailyWorks = DailyWork::with('group')
            ->orderBy('date', 'desc')
            ->paginate(10);

        return response()->json($dailyWorks);
    }
}
