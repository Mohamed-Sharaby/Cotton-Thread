<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductQuantity;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductQuantityController extends Controller
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
        return view(
            'dashboard.product-quantities.index',
            ['quantities' => ProductQuantity::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $products = Product::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('dashboard.product-quantities.create',compact('products','sizes','colors'));
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
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id',
            'color_id' => 'required|exists:colors,id',
            'quantity'=>'required|numeric'
        ]);
         ProductQuantity::create($data);
        return redirect()->route('admin.product-quantities.index')->with('success', __('Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(ProductQuantity $productQuantity)
    {
        $products = Product::all();
        return view('dashboard.product-quantities.edit', compact('productQuantity','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request,ProductQuantity $productSize)
    {
        $validator = $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_size_id' => 'required|exists:product_sizes,id',
            'product_color_id' => 'required|exists:product_colors,id',
            'quantity'=>'required|numeric'
        ]);

        $productSize->update($validator);
        return redirect()->route('admin.product-quantities.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(ProductQuantity $productQuantity)
    {
        $productQuantity->delete();
        return 'Done';
//        return redirect()->route('admin.product-quantities.index')->with('success', __('Deleted Successfully'));
    }


    public function getSizes($id)
    {
        $sizes = ProductSize::where('product_id', '=', $id)->pluck('size', 'id');
        return response()->json($sizes);
    }

    public function getColors($id)
    {
        $colors = ProductColor::where('product_id', '=', $id)->pluck('color', 'id');
        return response()->json($colors);
    }
}
