<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\RateComment;
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
        $categories = Category::active()->get();
        return view('site.products.all-products',compact('products','categories'));
    }


    public function show(Product $product)
    {
        //$similar_products = Product::where('id','<>',$product->id)->inRandomOrder()->get()->take(4);
        $similar_products = Product::where('subcategory_id',$product->subcategory_id)->inRandomOrder()->get();
        $can_rate = false ;
        if (auth()->check())
        {
            if (!RateComment::where(['user_id'=>auth()->user()->id,'product_id'=>$product->id])->exists())
                $can_rate = true;
        }
        return view('site.products.single-product',compact('product','similar_products','can_rate'));
    }

}
