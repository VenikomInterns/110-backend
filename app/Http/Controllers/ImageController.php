<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function index(): Response
    {
        $images = Image::all();
        return Inertia::render('Image/Index', compact('images'));
    } //excellent

    public function create(): Response
    {
        $products = Product::all();
        return Inertia::render('Image/Create', compact('products'));
    } //excellent

    public function store(Request $request): RedirectResponse
    {
        //How we can be sure that the user is uploading image?. Maybe its pdf or any other mime. 
        $image = new Image();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/public/images');
            $image->image = Str::substr($path, 14);
        }

        //how we can be sure the user is providing product_id?
        $image->product_id = $request->input('product_id');  
        $image->save();
        return redirect()->back();
    }
}
