<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\RateComment;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id = null)
    {
        $subCategoryName = SubCategory::whereId($id)->first();
        $products = Product::active();
        if (!is_null($id)) {
            $products = Product::whereSubcategoryId($id)->active();
        }
        $categories = Category::active()->get();

        if (!is_null(\request('q'))) {
            $products = $products->where('ar_name', 'like', '%' . \request('q') . '%')->orWhere('en_name', 'like', '%' . \request('q') . '%');
        }

        $products = $products->paginate(12);
        return view('site.products.all-products', compact('products', 'categories', 'subCategoryName'));
    }


    public function newProducts()
    {
        $products = Product::whereIsNew(1)->active()->paginate(12);
        return view('site.products.new-products', compact('products'));
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
        $rates = $product->rates()->get();
        $ratesCount = $product->rates()->count();
        return view('site.products.single-product', compact('product', 'similar_products', 'can_rate', 'rates', 'ratesCount'));
    }

    public function getSizesByColor(Request $request)
    {
        $sizes = ProductQuantity::with('size')->whereProductId($request->product_id)->whereColorId($request->color)->get();
        return response()->json(['pro_sizes' => $sizes]);
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


    public function getColors($id)
    {
        $product = Product::findOrFail($id);
        $colors = $product->product_colors;
        $sizes = $product->product_sizes;
        return response()->json(['id' => $product->id, 'colors' => $colors, 'sizes' => $sizes]);
    }


    public function filter(Request $request)
    {
        $products = Product::query();
        $categories = $request->category;
        $requestColors = $request->color;
        $requestSizes = $request->size;
        $price_from = $request->price_from;
        $price_to = $request->price_to;

        if ($request->has('category')) {
            $subCategories = SubCategory::whereIn('category_id', (array)$categories)->pluck('id')->toArray();
            $products = $products->whereIn('subcategory_id', $subCategories)->get();
        }
        if ($request->has('color')) {
            $colors = Color::whereIn('id', (array)$requestColors)->pluck('id')->toArray();
            $products = Product::whereHas('product_colors', function ($q) use ($colors) {
                $q->whereIn('color_id', $colors);
            })->get();
        }
        if ($request->has('size')) {
            $sizes = Size::whereIn('id', (array)$requestSizes)->pluck('id')->toArray();
            $products = Product::whereHas('product_sizes', function ($q) use ($sizes) {
                $q->whereIn('size_id', $sizes);
            })->get();
        }
        if (!is_null($price_from) && !is_null($price_to)) {
           $products = Product::whereBetween('price', [$price_from, $price_to])->get();
        }
        // $products = $products->paginate(12);
        // return view('site.products.all-products', compact('products'));
        return view('site.search', compact('products'));
    }

}
