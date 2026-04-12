<?php

namespace App\Http\Controllers;

use App\Models\DailyWork;
use Illuminate\Http\Request;
use App\Http\Requests\DailyWorkRequest;

class DailyWorkController extends Controller
{
    public function index()
    {
        $dailyWorks = DailyWork::all();
        return view('daily_work.index', compact('dailyWorks'));
    }

    public function create()
    {
        return view('daily_work.create');
    }

    public function store(DailyWorkRequest $request)
    {
        $dailyWork = new DailyWork();
        $dailyWork->work_id = $request->input('work_id');
        $dailyWork->reporte = $request->input('reporte');
        $dailyWork->date = $request->input('date');
        $dailyWork->evaluation = $request->input('evaluation');
        $dailyWork->Incidences = $request->input('Incidences');
        $dailyWork->save();
        return redirect()->route('daily_work.index');
    }

    public function show($id)
    {
        $dailyWork = DailyWork::findOrfail($id);
        return view('daily_work.show', compact('dailyWork'));
    }

    public function edit($id)
    {
        $dailyWork = DailyWork::findOrfail($id);
        return view('daily_work.edit', compact('dailyWork'));
    }

    public function update(DailyWorkRequest $request, $id)
    {
        $dailyWork = DailyWork::findOrfail($id);
        $dailyWork->work_id = $request->input('work_id');
        $dailyWork->reporte = $request->input('reporte');
        $dailyWork->date = $request->input('date');
        $dailyWork->evaluation = $request->input('evaluation');
        $dailyWork->Incidences = $request->input('Incidences');
        $dailyWork->save();
        return redirect()->route('daily_work.index');
    }

    public function destroy($id)
    {
        $dailyWork = DailyWork::findOrfail($id);
        $dailyWork->delete();
        return redirect()->route('daily_work.index');
    }
}
