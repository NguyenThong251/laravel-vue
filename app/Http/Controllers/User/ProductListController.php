<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'brand', 'product_images');
        $filterProducts = $products->filtered()->paginate(9)->withQueryString();

        $categories = Category::get();
        $brands = Brand::get();
        
        return Inertia::render(
            'User/ProductList',
            [
                'categories'=>$categories,
                'brands'=>$brands,
                'products' => ProductResource::collection($filterProducts)
            ]
        );
    }
    public function detail($id){
        $product = Product::with('category', 'brand', 'product_images')->findOrFail($id); ;
        return Inertia::render("User/ProductDetail",[
            'products'=>new ProductResource($product)
        ]);
    }
}