<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('permission:SubCategories');
//    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {

        return view(
            'dashboard.sub-categories.index',
            ['subCategories' => SubCategory::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::whereIsBan(0)->get();
        return view('dashboard.sub-categories.create',compact('categories'));
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
            'image' => 'required|image',
            'category_id' => 'required|exists:categories,id',
        ]);
//        if ($request->image){
//            $data['image'] = uploadImage('uploads',$request->image);
//        }

        SubCategory::create($data);
        return redirect()->route('admin.sub-categories.index')->with('success', __('Added Successfully'));
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
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('dashboard.sub-categories.edit', compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request,SubCategory $subCategory)
    {
        $validator = $request->validate([
            'ar_name' => 'required|string|max:100',
            'en_name' => 'required|string|max:100',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($request->has('image')) {
            if ($subCategory->image) {
                deleteImage('photos/subcategories',$subCategory->image);
            }
        }
        $subCategory->update($validator);
        return redirect()->route('admin.sub-categories.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(SubCategory $subCategory)
    {
        deleteImage('photos/subcategories',$subCategory->image);
        $subCategory->delete();
        return redirect()->route('admin.sub-categories.index')->with('success', __('Deleted Successfully'));
    }

}
