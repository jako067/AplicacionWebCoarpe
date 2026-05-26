<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialRequest;
        //////////////////// REVISAR EN ESTAR EL AUTH ///////////////////////

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialRequest $request)
    {
        $material = new Material();
        $material->material_name = $request->input('material_name');
        $material->unity_price = $request->input('unity_price');
        $material->quantity = $request->input('quantity');
        $material->supplier_contact = $request->input('supplier_contact');
        $material->save();
        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
       return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialRequest $request, Material $material)
    {
        $material->material_name = $request->input('material_name');
        $material->unity_price = $request->input('unity_price');
        $material->quantity = $request->input('quantity');
        $material->supplier_contact = $request->input('supplier_contact');
        $material->save();

        return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index');
    }
}
