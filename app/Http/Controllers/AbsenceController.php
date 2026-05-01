<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function create($userId)
    {
        $user = User::findOrFail($userId);
        return view('Absences.create', compact('user'));
    }
    public function store(Request $request, $userId)
    {
        $request->validate([
            'fecha' => 'required|date',
            'tipo' => 'nullable|string',
            'descripcion' => 'nullable|string'
        ]);

        Absence::create([
            'user_id' => $userId,
            'fecha' => $request->fecha,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('users.account')
            ->with('success', 'Absence registrada correctamente');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
}
