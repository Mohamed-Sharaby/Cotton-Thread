<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleImage;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Sales');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {

        return view(
            'dashboard.sales.index',
            ['sales' => Sale::first()->get()]
        );
    }

//if (is_array($request->images)) {
//foreach ($request->images as $image) {
//$product->images()->create(['image' => uploadImage('uploads', $image)]);
//}
//}

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //return view('dashboard.sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
//        $data = $request->validate([
//            'name' => 'required|string|max:100',
//            'content' => 'required|string|max:1000',
//            'image' => 'required|image',
//        ]);
//
//        if ($request->has('image')) {
//            $data['image'] = uploadImage('uploads', $request->image);
//        }
//         Sale::create($data);
//
//        return redirect()->route('admin.sales.index')->with('success', __('Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return
     */
    public function show(Sale $sale)
    {
       // return view('dashboard.sales.index',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(Sale $sale)
    {
        return view('dashboard.sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request,Sale $sale)
    {
        $validator = $request->validate([
            'phone' => 'required',
            'content' => 'required|string|max:2000',
            'image' => 'nullable|image',
        ]);

        $sale->update($validator);
        if (is_array($request->images)) {
            foreach ($request->images as $image) {
                $sale->sale_images()->create(['image' => uploadImage('uploads', $image)]);
            }
        }
        return redirect()->route('admin.sales.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
//    public function destroy(Sale $service)
//    {
//        deleteImage('uploads', $service->image);
//        $service->delete();
//        return redirect()->route('admin.sales.index')->with('success', __('Deleted Successfully'));
//    }

    public function del_sale_image(SaleImage $image)
    {
        $image->delete();
        deleteImage('uploads', $image->image);
        return response()->json([
            'status' => true,
            'id' =>$image->id,
        ]);
    }

}
