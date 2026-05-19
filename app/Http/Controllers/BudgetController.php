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
        // 1. Cálculo de Mano de Obra
        $totalNormal = $request->input('workers_quantity') * $request->input('hours_quantity') * $request->input('price_x_hour');
        $totalStaff = $request->input('staff_quantity') * $request->input('hours_quantity') * $request->input('staff_price');
        $manoDeObra = $totalNormal + $totalStaff;

        // 2. Crear Presupuesto Base
        $budget = new Budget();
        $budget->workers_quantity = $request->input('workers_quantity');
        $budget->hours_quantity = $request->input('hours_quantity');
        $budget->price_x_hour = $request->input('price_x_hour');
        $budget->staff_quantity = $request->input('staff_quantity');
        $budget->staff_price = $request->input('staff_price');
        $budget->final_price = 0; // Lo actualizamos al final
        $budget->save(); // Guardamos para que genere el ID necesario para la tabla pivote

        $totalMateriales = 0;

        // 3. Procesar MÚLTIPLES materiales existentes (Array dinámico)
        if ($request->has('materials')) {
            foreach ($request->input('materials') as $mat) {
                // Si el usuario seleccionó un material y puso cantidad
                if (!empty($mat['id']) && !empty($mat['quantity'])) {
                    $materialExistente = Material::find($mat['id']);
                    if ($materialExistente) {
                        $totalMateriales += ($materialExistente->unity_price * $mat['quantity']);
                        $budget->materials()->attach($materialExistente->material_id, ['quantity' => $mat['quantity']]);
                    }
                }
            }
        }

        // 4. Procesar el Material NUEVO (si el switch está activado)
        if ($request->input('crear_material_nuevo') == '1') {
            $material = new Material();
            $material->material_name = $request->input('new_material_name');
            $material->supplier_contact = $request->input('new_supplier_contact');
            $material->unity_price = $request->input('new_unity_price');
            $material->quantity = $request->input('new_stock_quantity');
            $material->save();

            $cantidadUsada = $request->input('quantity_used_in_budget');
            $totalMateriales += ($material->unity_price * $cantidadUsada);

            $budget->materials()->attach($material->material_id, ['quantity' => $cantidadUsada]);
        }

        // 5. Actualizar el precio total sumando mano de obra + todos los materiales
        $budget->final_price = $manoDeObra + $totalMateriales;
        $budget->save();

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
   /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        // CORRECCIÓN: Necesitamos traer todos los materiales para los desplegables de la edición
        $materials = \App\Models\Material::all();
        return view('budgets.edit', compact('budget', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BudgetRequest $request, Budget $budget)
    {
        // 1. Cálculo de Mano de Obra combinada
        $totalNormal = $request->input('workers_quantity') * $request->input('hours_quantity') * $request->input('price_x_hour');
        $totalStaff = $request->input('staff_quantity') * $request->input('hours_quantity') * $request->input('staff_price');
        $manoDeObra = $totalNormal + $totalStaff;

        // 2. Actualizar Datos Base
        $budget->workers_quantity = $request->input('workers_quantity');
        $budget->hours_quantity = $request->input('hours_quantity');
        $budget->price_x_hour = $request->input('price_x_hour');
        $budget->staff_quantity = $request->input('staff_quantity');
        $budget->staff_price = $request->input('staff_price');

        $totalMateriales = 0;
        $syncData = []; // Array para el método sync()

        // 3. Procesar los materiales que vienen del formulario de edición
        if ($request->has('materials')) {
            foreach ($request->input('materials') as $mat) {
                if (!empty($mat['id']) && !empty($mat['quantity'])) {
                    $materialExistente = Material::find($mat['id']);
                    if ($materialExistente) {
                        $totalMateriales += ($materialExistente->unity_price * $mat['quantity']);

                        // Estructura requerida por Laravel para tablas pivote: [$id => ['campo_pivote' => valor]]
                        $syncData[$materialExistente->material_id] = ['quantity' => $mat['quantity']];
                    }
                }
            }
        }

        // El método sync() elimina automáticamente las relaciones antiguas que ya no vengan
        // en el array, actualiza las modificadas y añade las nuevas en la tabla intermedia.
        $budget->materials()->sync($syncData);

        // 4. Calcular y guardar el precio final total recalculado
        $budget->final_price = $manoDeObra + $totalMateriales;
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
