<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
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
            'dashboard.product-sizes.index',
            ['sizes' => ProductSize::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.product-sizes.create',compact('products'));
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
            'size' => 'required|string',
        ]);
         ProductSize::create($data);
        return redirect()->route('admin.product-sizes.index')->with('success', __('Added Successfully'));
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
    public function edit(ProductSize $productSize)
    {
        $products = Product::all();
        return view('dashboard.product-sizes.edit', compact('productSize','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request,ProductSize $productSize)
    {
        $validator = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|string',
        ]);

        $productSize->update($validator);
        return redirect()->route('admin.product-sizes.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(ProductSize $productSize)
    {
        $productSize->delete();
        return redirect()->route('admin.product-sizes.index')->with('success', __('Deleted Successfully'));
    }

}
