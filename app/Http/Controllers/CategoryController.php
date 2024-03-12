<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);

        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $data = $request->validated();
        $category->update($data);

        return view('category.show', compact('category'));
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
