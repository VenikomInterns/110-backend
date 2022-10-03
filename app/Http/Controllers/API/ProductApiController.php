<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

//If you separate API controllers inside other Folder and namespace, you don't need to mention Api in the controller name. 
class ProductApiController extends Controller
{
    
    public function show(Product $product): JsonResource
    {
         //You don't need to save the result into a variable. 
        $productInfo = $product->loadMissing('images');
        return JsonResource::make($productInfo);

        //can be simplified as:
        //$product->loadMissing('images')
        //return JsonResoruce::make($product)l
    }
}
