<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Income;


class CategoryController extends Controller
{

    public function index()
    {
        $title = "Categories";
        $routeName = "categories";
    
        $categories = ['Salary', 'Passive', 'Investments'];
    
        $elementos = [
            ['title' => 'Incomes', 'route' => 'incomes'],
            ['title' => 'Outcomes', 'route' => 'outcomes'],
            ['title' => 'Categories', 'route' => 'categories'],
        ];
    
        return view('categories.index', compact('title', 'routeName', 'categories', 'elementos'));
    }

    public function show(string $category)
    {
        $incomes = Income::where('category', $category)->get();

        return view('categories.show', compact('incomes', 'category'));
    }

    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }


    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
  
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
