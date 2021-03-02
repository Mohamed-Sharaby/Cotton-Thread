<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\RateComment;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Products');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        return view('dashboard.products.index', ['products' => Product::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $subCategories = SubCategory::whereIsBan(0)->get();
        return view('dashboard.products.create', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_name' => 'required|string|max:100',
            'en_name' => 'required|string|max:100',
            'discount' => 'nullable',
            'price' => 'required|numeric',
            'is_new' => 'required|boolean',
            'ar_details' => 'required|max:2000',
            'en_details' => 'required|max:2000',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'image' => 'required|image|max:2048',
        ]);

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', __('Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $sizes = $product->product_sizes;
        return view('dashboard.products.sizes', compact('product', 'sizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(Product $product)
    {
        $subCategories = SubCategory::all();
        return view('dashboard.products.edit', compact('product', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Product $product)
    {
        $validator = $request->validate([
            'ar_name' => 'required|string|max:100',
            'en_name' => 'required|string|max:100',
            'discount' => 'nullable',
            'price' => 'required|numeric',
            'is_new' => 'required|boolean',
            'ar_details' => 'required|max:2000',
            'en_details' => 'required|max:2000',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'image' => 'nullable|image|max:2048',
        ]);
        if ($request->has('image')) {
            if ($product->image) {
                deleteImage('photos/products', $product->image);
            }
        }
        $product->update($validator);
        return redirect()->route('admin.products.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return 'Done';
    }


    public function details(Product $product)
    {
        return view('dashboard.products.product_details', compact('product'));
    }


    public function addQuantity($id)
    {
        $product = Product::findOrFail($id);
        $sizes = Size::all();
        $colors = Color::all();
        return view('dashboard.products.add_quantity', compact('product', 'sizes', 'colors'));
    }

    public function storeQuantity(Request $request, $id)
    {
        $request->validate([
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'quantity' => 'required|numeric|min:1'
        ]);
        $product = Product::findOrFail($id);
        $productQuantity = ProductQuantity::where('product_id',$product->id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->first();

        if ($productQuantity){
            $productQuantity->update([
                'quantity'=>$productQuantity->quantity + $request->quantity
            ]);
        }else{
            $product->product_quantity()->create([
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('admin.products.quantities',$product->id)->with('success', 'تم الاضافة بنجاح');
    }


    public function addSize($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.products.add_size', compact('product'));
    }


    public function quantities($id)
    {
        $product = Product::findOrFail($id);
        $quantities = ProductQuantity::whereProductId($id)->get();
        return view('dashboard.products.quantities', compact('product', 'quantities'));
    }

    public function editQuantity($id)
    {
        $quantity = ProductQuantity::whereId($id)->first();
        $sizes = Size::all();
        $colors = Color::all();
        return view('dashboard.products.edit_quantity', compact('quantity', 'sizes', 'colors'));
    }

    public function updateQuantity(Request $request, $id)
    {
        $quantity = ProductQuantity::whereId($id)->first();
        $request->validate([
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'quantity' => 'required|numeric|min:1'
        ]);
        $quantity->update($request->all());
        return redirect()->route('admin.products.quantities',$quantity->product->id)->with('success', 'تم التعديل بنجاح');
    }

    public function destroyQuantity($id)
    {
        $quantity = ProductQuantity::findOrFail($id);
        $quantity->delete();
        return 'Done';
    }


    public function getRates(Product $product)
    {
        $rates = $product->rates;
        return view('dashboard.products.rates', compact('rates', 'product'));
    }

    public function destroyRate($id)
    {
        $rate = RateComment::findOrFail($id);
        $rate->delete();
        return 'Done';
    }


}
