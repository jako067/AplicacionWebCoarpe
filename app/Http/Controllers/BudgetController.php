<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\BudgetRequest;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budgets = Budget::all();
        return view('budgets.index', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materials = \App\Models\Material::all();
        return view('budgets.create', compact('materials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BudgetRequest $request)
{

    $totalNormal = $request->input('workers_quantity') * $request->input('hours_quantity') * $request->input('price_x_hour');
    $totalStaff = $request->input('staff_quantity') * $request->input('hours_quantity') * $request->input('staff_price');
    $budget = new Budget();
    $budget->workers_quantity = $request->input('workers_quantity');
    $budget->hours_quantity = $request->input('hours_quantity');
    $budget->price_x_hour = $request->input('price_x_hour');
    $budget->staff_quantity = $request->input('staff_quantity');
    $budget->staff_price = $request->input('staff_price');
    $budget->final_price = $totalNormal + $totalStaff;
    $budget->save();
    // si selecciona el chechbox
    if ($request->input('crear_material_nuevo') == '1') {

        // Creamos el objeto Material (Asignación manual)
        $material = new Material();
        $material->material_name = $request->input('new_material_name');
        $material->supplier_contact = $request->input('new_supplier_contact');
        $material->unity_price = $request->input('new_unity_price');
        $material->quantity = $request->input('new_stock_quantity');
        $material->save();

        $budget->materials()->attach($material->material_id, [
            'quantity' => $request->input('quantity_used_in_budget')
        ]);
    }
    //materiales que ja están en la BD
    if ($request->filled('existing_material_id') && $request->filled('existing_material_quantity')) {
        $budget->materials()->attach(
            $request->input('existing_material_id'),
            ['quantity' => $request->input('existing_material_quantity')]
        );
    }

    return redirect()->route('budgets.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        return view('budgets.show', compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        return view('budgets.edit', compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BudgetRequest $request, Budget $budget)
    {
        //cálcul del preu final pa despúes
        $calculatedFinalPrice = $request->input('workers_quantity') * $request->input('hours_quantity') * $request->input('price_x_hour');


        $budget->workers_quantity = $request->input('workers_quantity');
        $budget->hours_quantity = $request->input('hours_quantity');
        $budget->price_x_hour = $request->input('price_x_hour');
        $budget->final_price = $calculatedFinalPrice;
        $budget->save();

        return redirect()->route('budgets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $budget = Budget::findOrFail($id);
        $budget->materials()->detach();

        $budget->delete();
        return redirect()->route('budgets.index');
    }

}

// SOLUCION PARA CALCULAR EL PRECIO FINAL CON MANO+MATERIAL
// CAMBIAR EL STORE POR ESTE EL DE ARA SOL GUARDA MANO OBRA
//  public function store(BudgetRequest $request)
//     {
//         $totalNormal = $request->input('workers_quantity') * $request->input('hours_quantity') * $request->input('price_x_hour');
//         $totalStaff = $request->input('staff_quantity') * $request->input('hours_quantity') * $request->input('staff_price');
//         $manoDeObra = $totalNormal + $totalStaff;

//         $budget = new Budget();
//         $budget->workers_quantity = $request->input('workers_quantity');
//         $budget->hours_quantity = $request->input('hours_quantity');
//         $budget->price_x_hour = $request->input('price_x_hour');
//         $budget->staff_quantity = $request->input('staff_quantity');
//         $budget->staff_price = $request->input('staff_price');

//         //  materiales
//          $totalMateriales = 0;

//         // Si se crea material nuevo
//         if ($request->input('crear_material_nuevo') == '1') {
//             $material = new Material();
//             $material->material_name = $request->input('new_material_name');
//             $material->supplier_contact = $request->input('new_supplier_contact');
//             $material->unity_price = $request->input('new_unity_price');
//             $material->quantity = $request->input('new_stock_quantity');
//             $material->save();

//             $cantidadUsada = $request->input('quantity_used_in_budget');
//             $totalMateriales += ($material->unity_price * $cantidadUsada);

//             // GUARDAR MATERIAL NOU
//             $budget->final_price = $manoDeObra + $totalMateriales;
//             $budget->save();

//             $budget->materials()->attach($material->material_id, ['quantity' => $cantidadUsada]);
//         }
//         // Si se usa material existente
//         elseif ($request->filled('existing_material_id') && $request->filled('existing_material_quantity')) {
//             $materialExistente = Material::find($request->input('existing_material_id'));
//             $cantidadUsada = $request->input('existing_material_quantity');
//             $totalMateriales += ($materialExistente->unity_price * $cantidadUsada);

//                  //GURDAR BD
//             $budget->final_price = $manoDeObra + $totalMateriales;
//             $budget->save();

//             $budget->materials()->attach($request->input('existing_material_id'), ['quantity' => $cantidadUsada]);
//         }
//         // SOLO MANO
//         else {
//             $budget->final_price = $manoDeObra;
//             $budget->save();
//         }

//         return redirect()->route('budgets.index');
//     }
