<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income; 

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::all();
    
        $tableData = [
            'heading' => ['date', 'category', 'amount'],
            'data' => $incomes->map(function ($income) {
                return [
                    $income->date,
                    $income->category,
                    $income->amount,
                ];
            }),
        ];
    
        $nombreEnlace = ['enlace' => 'http://holahola.es'];
        $elementos = [
            ['title' => 'Incomes', 'route' => 'incomes'],
            ['title' => 'Outcomes', 'route' => 'outcomes'],
        ];
    
        return view('income.index', [
            'title' => 'My incomes',
            'tableData' => $tableData,
            'nombreEnlace' => $nombreEnlace,
            'elementos' => $elementos,
            'incomes' => $incomes,
            'routeName' => 'incomes', 
        ]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'date' => 'required|date',
        'category' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
    ]);

    // Crear un nuevo ingreso en la base de datos
    Income::create([
        'date' => $request->date,
        'category' => $request->category,
        'amount' => $request->amount,
    ]);

    // Redirigir a la lista de ingresos con un mensaje de éxito
    return redirect()->route('incomes.index')->with('success', 'Income added successfully!');
}

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return '<p>Esta es la página del show de incomes</p>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $income = Income::findOrFail($id);
    
    $elementos = [
        ['title' => 'Incomes', 'route' => 'incomes'],
        ['title' => 'Outcomes', 'route' => 'outcomes'],
    ];
    
    return view('income.update', compact('income', 'elementos'));
}

    

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Validar los datos del formulario
    $request->validate([
        'date' => 'required|date',
        'category' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
    ]);

    // Buscar el ingreso en la base de datos
    $income = Income::findOrFail($id);

    // Actualizar los datos
    $income->update([
        'date' => $request->date,
        'category' => $request->category,
        'amount' => $request->amount,
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('incomes.index')->with('success', 'Income updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income = Income::findOrFail($id);  
        // Eliminar el Outcome
        $income->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('incomes.index')->with('success', 'Outcome deleted successfully');
    }
}
