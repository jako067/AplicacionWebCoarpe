<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialRequest;

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

    public function store(MaterialRequest $request)
    {
        $material = new Material();
        $material->Material_name = $request->input('Material_name');
        $material->Unity_price = $request->input('Unity_price');
        $material->Quantity = $request->input('Quantity');
        $material->Supplier = $request->input('Supplier');
        $material->Contact = $request->input('Contact');
        $material->save();
        return redirect()->route('materials.index');
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

    public function update(MaterialRequest $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->Material_name = $request->input('Material_name');
        $material->Unity_price = $request->input('Unity_price');
        $material->Quantity = $request->input('Quantity');
        $material->Supplier = $request->input('Supplier');
        $material->Contact = $request->input('Contact');
        $material->save();
        return redirect()->route('materials.index');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->route('materials.index');
    }
}
