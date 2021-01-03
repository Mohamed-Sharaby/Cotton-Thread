<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        return view('dashboard.products.create');
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
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'price' => 'required|numeric',
            'warranty' => 'required|numeric',
            'image' => 'required|image',
        ]);

        if ($request->has('image')) {
            $data['image'] = uploadImage('uploads', $request->image);
        }
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
        return view('dashboard.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request,Product $product)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'price' => 'required|numeric',
            'warranty' => 'required|numeric',
            'image' => 'nullable|image',
        ]);
        if ($request->has('image')) {
            if ($product->image) {
                deleteImage('uploads', $product->image);
            }
            $validator['image'] = uploadImage('uploads', $request->image);
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
        deleteImage('uploads', $product->image);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', __('Deleted Successfully'));
    }

}
