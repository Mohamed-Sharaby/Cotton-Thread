<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductImageController extends Controller
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
            'dashboard.product-images.index',
            ['images' => ProductImage::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.product-images.create',compact('products'));
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
            'image' => 'required|image',
        ]);
        if ($request->has('image')) {
            $data['image'] = uploadImage('uploads', $request->image);
        }
         ProductImage::create($data);
        return redirect()->route('admin.product-images.index')->with('success', __('Added Successfully'));
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
    public function edit(ProductImage $productImage)
    {
        $products = Product::all();
        return view('dashboard.product-images.edit', compact('productImage','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request,ProductImage $productImage)
    {
        $validator = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'nullable|image',
        ]);
        if ($request->has('image')) {
            if ($productImage->image) {
                deleteImage('uploads', $productImage->image);
            }
            $validator['image'] = uploadImage('uploads', $request->image);
        }
        $productImage->update($validator);
        return redirect()->route('admin.product-images.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(ProductImage $productImage)
    {
        if ($productImage->image) {
            deleteImage('uploads', $productImage->image);
        }
        $productImage->delete();
        return redirect()->route('admin.product-images.index')->with('success', __('Deleted Successfully'));
    }

}
