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
            ['products' => Product::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.product-images.create', compact('products'));
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
        return view('dashboard.product-images.edit', compact('productImage', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, ProductImage $productImage)
    {
        $validator = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'nullable|image',
        ]);
        if ($request->has('image')) {
            if ($productImage->image) {
                deleteImage('photos/product_images',$productImage->image);
            }
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
            deleteImage('photos/product_images',$productImage->image);
        }
        $productImage->delete();
        return redirect()->route('admin.product-images.index')->with('success', __('Deleted Successfully'));
    }

    // add image to product
    public function add_image($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.product-images.add_image',compact('product'));
    }
    public function store_image(Request $request)
    {
        //dd($request->all());
        $product = Product::findOrFail($request->product_id);
        $request->validate([
            'product_id'=>'required|exists:products,id',
            'image'=>'required|image'
        ]);
        ProductImage::create([
            'product_id'=>$product->id,
            'image'=>$request->image
        ]);
        return redirect()->route('admin.product-images.index')->with('success','تم الاضافة بنجاح');
    }

    // delete product image
    public function del_image($id)
    {
        $image = ProductImage::findOrFail($id);
        deleteImage('photos/product_images',$image->image);
        $image->delete();

        return response()->json([
            'status' => true,
            'id' => $image->id,
        ]);
    }

}
