<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductApiController extends Controller
{
    public function show(Product $product): JsonResource
    {
        $productInfo = $product->loadMissing('images');
        return JsonResource::make($productInfo);
    }
}
