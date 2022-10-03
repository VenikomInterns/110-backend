<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        $products = Product::query()->paginate(4);
        return Inertia::render('Product/Index', compact('products'));
    }

    public function show(Product $product): Response
    {
       $product->loadMissing('images');
       return Inertia::render('Product/Show', compact('product'));
    }

    public function create(): Response
    {
        $categories = Category::all();
        return Inertia::render('Product/Create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        Product::query()->create($validated);
        return redirect()->back();
    }

    public function edit(Product $product): Response
    {
        $categories = Category::all();
        return Inertia::render('Product/Edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $product->fill($validated);
        $product->save();

        return redirect()->back();
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->back();
    }
}
