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
        $products = Product::active();
        if (!is_null($id)) {
            $products = Product::whereSubcategoryId($id)->active();
        }
        $categories = Category::active()->get();

        if (!is_null(\request('q'))) {
            $products = $products->where('ar_name', 'like', '%'.\request('q').'%')->orWhere('en_name', 'like', '%'.\request('q').'%');
        }
        $products = $products->paginate(12);
        return view('site.products.all-products', compact('products', 'categories'));
    }

    public function newProducts()
    {
        $products = Product::whereIsNew(1)->active()->paginate(12);
        return view('site.products.new-products',compact('products'));
    }


    public function show(Product $product)
    {
        //$similar_products = Product::where('id','<>',$product->id)->inRandomOrder()->get()->take(4);
        $similar_products = Product::where('subcategory_id', $product->subcategory_id)->inRandomOrder()->get();
        $can_rate = false;
        if (auth()->check()) {
            if (!RateComment::where(['user_id' => auth()->user()->id, 'product_id' => $product->id])->exists())
                $can_rate = true;
        }
        return view('site.products.single-product', compact('product', 'similar_products', 'can_rate'));
    }

    public function rate(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $request->validate([
            'rate' => '',
            'comment' => 'required'
        ]);
        $request['user_id'] = auth()->user()->id;
        $product->rates()->create($request->all());

        return redirect()->to(url()->previous() . '#pro-rating')->with('success', __('Comment Saved Successfully'));
    }

}
