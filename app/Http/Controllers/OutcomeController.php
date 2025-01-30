<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outcome;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outcome = Outcome::all();
        
        $tableData = [
            'heading' => ['date', 'category', 'taxes'],
            'data' => $outcome->map(function ($outcome) {
                return [
                    $outcome->date,
                    $outcome->category,
                    $outcome->taxes,
                ];
            }),
        ];

        $nombreEnlace = [
            'enlace' => 'http://holahola.es',
        ];

        $elementos = [
            ['title' => 'Incomes', 'route' => 'incomes'],
            ['title' => 'Outcomes', 'route' => 'outcomes'],
        ];

        return view('outcome.index', [
            'title' => 'My outcomes',
            'tableData' => $tableData,
            'nombreEnlace' => $nombreEnlace,
            'elementos' => $elementos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return '<p>Esta es la página del create de incomes</p>';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return '<p>Esta es la página del edit de incomes</p>';
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
