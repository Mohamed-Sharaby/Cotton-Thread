<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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

        return view(
            'dashboard.products.index',
            ['products' => Product::latest()->get()]
        );
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
            'discount' => 'required',
            'price' => 'required|numeric',
            'is_new' => 'required|boolean',
            'ar_details' => 'required|max:2000',
            'en_details' => 'required|max:2000',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'image' => 'required|image',
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
        //
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
            'discount' => 'required',
            'price' => 'required|numeric',
            'is_new' => 'required|boolean',
            'ar_details' => 'required|max:2000',
            'en_details' => 'required|max:2000',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'image' => 'nullable|image',
        ]);
        if ($request->has('image')) {
            if ($product->image) {
                deleteImage('photos/products',$product->image);
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
        deleteImage('photos/products',$product->image);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', __('Deleted Successfully'));
    }


}
