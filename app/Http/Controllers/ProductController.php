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
    }//exellent

    public function show(Product $product): Response
    {
       $product->loadMissing('images');
       return Inertia::render('Product/Show', compact('product'));
    }//exellent

    public function create(): Response
    {
        $categories = Category::all();
        return Inertia::render('Product/Create', compact('categories'));
    }//exellent

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required', //What if user provides doesn't send us real number but string instead.
            'description' => 'required',
            'category_id' => 'required' // What if user doesn't give us real id of category.
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
            'price' => 'required', //What if user provides doesn't send us real number but string instead.
            'description' => 'required',
            'category_id' => 'required'// What if user doesn't give us real id of category.
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
