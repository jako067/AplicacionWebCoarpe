<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

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
        return view('budgets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( BudgetRequest $request)
        //////////////////// REVISAR EN ESTAR EL AUTH ///////////////////////

    {
        $calculatedFinalPrice = $request->input('workers_quantity') * $request->input('hours_quantity') * $request->input('price_x_hour');

        $budget = new Budget();


        $budget->workers_quantity = $request->input('workers_quantity');
        $budget->hours_quantity = $request->input('hours_quantity');
        $budget->price_x_hour= $request->input('price_x_hour');
        $budget->final_price = $calculatedFinalPrice;
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
    public function edit(Budget $budget)
    {
        return view('budgets.edit', compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Budget $budget)
    {
        //cálcul del preu final pa despúes
        $calculatedFinalPrice = $request->input('workers_quantity') * $request->input('hours_quantity') * $request->input('price_x_hour');


        $budget->workers_quantity = $request->input('workers_quantity');
        $budget->hours_quantity   = $request->input('hours_quantity');
        $budget->price_x_hour     = $request->input('price_x_hour');
        $budget->final_price      = $calculatedFinalPrice;
        $budget->save();

        return redirect()->route('budgets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        // si borrem un presupost borrem els materials asignats(?)

        $budget->delete();
        return redirect()->route('budgets.index');
    }
}
