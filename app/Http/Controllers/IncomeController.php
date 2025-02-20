<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $category = $request->query('category');
     
         $query = Income::query();
         if ($category) {
             $query->where('category', $category);
         }
     
         $incomes = $query->get();
     
         $tableData = [
             'heading' => ['ID', 'Date', 'Category', 'Amount'],
             'data' => $incomes->map(function ($income) {
                 return [
                     'id' => $income->id,
                     'date' => $income->date,
                     'category' => $income->category,
                     'amount' => $income->amount,
                 ];
             }),
         ];
     
         $elementos = [
             ['title' => 'Incomes', 'route' => 'incomes'],
             ['title' => 'Outcomes', 'route' => 'outcomes'],
             ['title' => 'Categories', 'route' => 'categories'],
         ];
     
         $title = "My Incomes";
         $routeName = "incomes";
     
         return view('income.index', compact('title', 'tableData', 'elementos', 'incomes', 'routeName'));
     }
     
        


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01|max:999999',
            'category' => 'required|string|max:20',
            'date' => 'required|date|before_or_equal:today',
        ]);

        Income::create($request->all());

        return redirect()->route('incomes.index')->with('success', 'Ingreso agregado correctamente.');
    }
    
    public function create()
    {
        return view('income.create');
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01|max:999999',
            'category' => 'required|string|max:20',
            'date' => 'required|date|before_or_equal:today',
        ]);

        $income = Income::findOrFail($id);

        $income->update([
            'date' => $request->date,
            'category' => $request->category,
            'amount' => $request->amount,
        ]);

        return redirect()->route('incomes.index')->with('success', 'Ingreso actualizado correctamente.');
    }

    public function show(string $id)
    {
        $income = Income::findOrFail($id);

        return view('income.show', compact('income'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income = Income::findOrFail($id);

        $income->delete();

        return redirect()->route('incomes.index')->with('success', 'Ingreso eliminado correctamente.');
    }
}
