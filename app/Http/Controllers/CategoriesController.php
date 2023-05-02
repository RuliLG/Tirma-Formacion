<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->paginate(10);

        return view('categories', [
            'categories' => $categories,
        ]);
    }

    public function show(Category $category)
    {
        return view('category', [
            'category' => $category,
        ]);
    }

    public function create()
    {
        return view('create-category');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255', 'unique:categories,name'],
            'is_active' => ['sometimes', 'accepted'],
        ]);

        Category::create($validated);

        return redirect()->back();
    }

    public function update(Category $category, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:255', 'unique:categories,name,' . $category->id],
            'is_active' => ['sometimes', 'accepted'],
        ]);

        if (!isset($validated['is_active'])) {
            $validated['is_active'] = false;
        }

        $category->update($validated);

        return redirect()
            ->back()
            ->with('success', true);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
