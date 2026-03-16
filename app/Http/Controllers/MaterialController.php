<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        return view('materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Material_name' => 'required|string|max:255',
            'Unity_price' => 'required|numeric',
            'Quantity' => 'required|integer',
            'Supplier' => 'required|string|max:255',
            'Contact' => 'required|string|max:255',
        ]);

        Material::create($request->all());
        return redirect()->route('materials.index')->with('success', 'Material creado correctamente.');
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        return view('materials.show', compact('material'));
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('materials.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Material_name' => 'required|string|max:255',
            'Unity_price' => 'required|numeric',
            'Quantity' => 'required|integer',
            'Supplier' => 'required|string|max:255',
            'Contact' => 'required|string|max:255',
        ]);

        $material = Material::findOrFail($id);
        $material->update($request->all());
        return redirect()->route('materials.index')->with('success', 'Material actualizado correctamente.');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Material eliminado correctamente.');
    }
}
