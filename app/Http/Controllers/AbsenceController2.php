<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Http\Request;

class AbsenceController2 extends Controller
{

    public function index(User $user)
{
    $absences = $user->absences;
    return view('absences.index', compact('user', 'absences'));
}

public function create(User $user)
{
    return view('absences.create', compact('user'));
}

public function store(Request $request, User $user)
{
    Absence::create([
        'user_id' => $user->id,
        'fecha' => $request->fecha,
        'tipo' => $request->tipo,
        'descripcion' => $request->descripcion
    ]);

    return redirect()->route('absences.index', $user);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
