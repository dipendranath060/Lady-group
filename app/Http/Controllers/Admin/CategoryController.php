<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:30|unique:category',
            'is_active' => 'required'
        ]);

        $categories = new Categories;
        $categories->name = $request->name;
        $categories->is_active = $request->is_active;

        $categories->save();
        return redirect()->route('categories')
                    ->with('message', 'Category Added Successfully...');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categories::find($id);
        if($categories)
        {
            return view('admin.categories.edit', compact('categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            // 'is_active' => 'required'
        ]);

        $categories = Categories::find($id);
        if($categories)
        {
            $categories->name = $request->name;
            $categories->is_active = $request->is_active;
    
            $categories->update();
            return redirect()->route('categories')
                        ->with('message', 'Category Updated Successfully...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Categories::find($id);
        if($categories)
        {
            $categories->delete();

            return redirect()->route('categories')
                        ->with('status', 'Category Deleted Successfully...');
        }
    }
}
