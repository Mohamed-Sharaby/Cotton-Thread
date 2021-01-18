<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id = null)
    {
        $products = Product::active()->get();
        if (!is_null($id)) {
            $products = Product::whereSubcategoryId($id)->active()->get();
        }
        return view('site.products.all-products',compact('products'));
    }


    public function show(Product $product)
    {

        $similar_products = Product::where('id','<>',$product->id)->inRandomOrder()->get()->take(4);
        $can_rate = false ;
        if (auth()->check())
        {
            if (!Rate::where(['user_id'=>auth()->user()->id,'product_id'=>$product->id])->exists())
                $can_rate = true;
        }
        return view('site.products.single-product',compact('product','similar_products','can_rate'));
    }

}
