<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Color;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ColorController extends Controller
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
            'dashboard.colors.index',
            ['colors' => Color::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.colors.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
        ]);
         Color::create($data);
        return redirect()->route('admin.colors.index')->with('success', __('Added Successfully'));
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
    public function edit(Color $color)
    {
        return view('dashboard.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request,Color $color)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
        ]);

        $color->update($validator);
        return redirect()->route('admin.colors.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return 'Done';
//        return redirect()->route('admin.colors.index')->with('success', __('Deleted Successfully'));
    }

}
