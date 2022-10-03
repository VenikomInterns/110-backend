<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

//If you separate API controllers inside other Folder and namespace, you don't need to mention Api in the controller name. 
class CategoryApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $categories = Category::query()->paginate(2);
        return JsonResource::collection($categories);
    }

    public function show(Category $category): JsonResource
    {
        //You don't need to save the result into a variable. 
        $categoryProducts = $category->loadMissing('products');
        return JsonResource::make($categoryProducts);
        //can be simplified as:
        //$category->loadMissing('products')
        //return JsonResoruce::make($category)l
    }
}
