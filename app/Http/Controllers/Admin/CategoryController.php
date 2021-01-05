<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Categories');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {

        return view(
            'dashboard.categories.index',
            ['categories' => Category::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
        ]);
//        if ($request->image){
//            $data['image'] = uploadImage('uploads',$request->image);
//        }

        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', __('Added Successfully'));
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
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Category $category)
    {
        $validator = $request->validate([
            'ar_name' => 'required|string|max:100',
            'en_name' => 'required|string|max:100',
            'image' => 'nullable|image',
        ]);
        if ($request->has('image')) {
            if ($category->image) {
                deleteImage('photos/categories',$category->image);
            }
        }
        $category->update($validator);
        return redirect()->route('admin.categories.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Category $category)
    {
        deleteImage('photos/categories',$category->image);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', __('Deleted Successfully'));
    }

}
