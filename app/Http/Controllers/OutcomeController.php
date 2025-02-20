<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outcome;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            $category = $request->query('category');
        
            $query = Outcome::query();
            if ($category) {
                $query->where('category', $category);
            }
        
            $outcomes = $query->get();
        
            $tableData = [
                'heading' => ['ID', 'Date', 'Category', 'Amount'],
                'data' => $outcomes->map(function ($outcomes) {
                    return [
                        'id' => $outcomes->id,
                        'date' => $outcomes->date,
                        'category' => $outcomes->category,
                        'amount' => $outcomes->amount,
                    ];
                }),
            ];
        
            $elementos = [
                ['title' => 'Incomes', 'route' => 'incomes'],
                ['title' => 'Outcomes', 'route' => 'outcomes'],
                ['title' => 'Categories', 'route' => 'categories'],
            ];
        
            $title = "My Outcomes";
            $routeName = "outcomes";
        
            return view('outcome.index', compact('title', 'tableData', 'elementos', 'outcomes', 'routeName'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outcome.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'amount' => 'required|numeric|min:0.01|max:999999',
            'category' => 'required|string|max:20',
            'date' => 'required|date|before_or_equal:today',
        ]);
    
        // Crear un nuevo ingreso en la base de datos
        Outcome::create([
            'date' => $request->date,
            'category' => $request->category,
            'taxes' => $request->taxes,
        ]);
    
        // Redirigir a la lista de ingresos con un mensaje de éxito
        return redirect()->route('outcomes.index')->with('success', 'Outcome added successfully!');
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
        $outcome = Outcome::findOrFail($id);
    
        $elementos = [
            ['title' => 'Incomes', 'route' => 'incomes'],
            ['title' => 'Outcomes', 'route' => 'outcomes'],
        ];
    
        return view('outcome.update', compact('outcome', 'elementos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'taxes' => 'required|numeric|min:0.01|max:999999',
            'category' => 'required|string|max:20',
            'date' => 'required|date|before_or_equal:today',
        ]);
    
        // Buscar el ingreso en la base de datos
        $outcome = Outcome::findOrFail($id);
    
        // Actualizar los datos
        $outcome->update([
            'date' => $request->date,
            'category' => $request->category,
            'taxes' => $request->taxes,
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('outcomes.index')->with('success', 'Outcome updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $outcome = Outcome::findOrFail($id);  
        // Eliminar el Outcome
        $outcome->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('outcomes.index')->with('success', 'Outcome deleted successfully');
    }
}
