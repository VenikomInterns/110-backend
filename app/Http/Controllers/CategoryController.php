<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(): Response
    {
        $categories = Category::query()
            ->with('products')
            ->paginate(2);
        return Inertia::render('Category/Index', compact('categories'));
    }

    public function show(Category $category): Response
    {
        $category->loadMissing('products');
        return Inertia::render('Category/Show', compact('category'));
    }

    public function create(): Response
    {
        return Inertia::render('Category/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
           'name' => 'required'
        ]);

        Category::query()->create($validated);
        return redirect()->back();
    }

    public function edit(Category $category): Response
    {
        return Inertia::render('Category/Edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $category->fill($validated);
        $category->save();

        return redirect()->back();
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->back();
    }
}
