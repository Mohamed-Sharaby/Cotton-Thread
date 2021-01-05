<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Galleries');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {

        return view(
            'dashboard.galleries.index',
            ['galleries' => Gallery::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.galleries.create');
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
            'ar_details' => 'required|max:2000',
            'en_details' => 'required|max:2000',
            'type' => 'required|in:video,image',
            'url' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        Gallery::create($data);
        return redirect()->route('admin.galleries.index')->with('success', __('Added Successfully'));
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
    public function edit(Gallery $gallery)
    {
        return view('dashboard.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validator = $request->validate([
            'ar_name' => 'required|string|max:100',
            'en_name' => 'required|string|max:100',
            'ar_details' => 'required|max:2000',
            'en_details' => 'required|max:2000',
            'type' => 'required|in:video,image',
            'url' => 'required_if:type,video|url',
            'image' => 'required_if:type,image|image',
        ]);
        if ($request->has('image')) {
            if ($gallery->image) {
                deleteImage('photos/galleries',$gallery->image);
            }
        }
        $gallery->update($validator);
        return redirect()->route('admin.galleries.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Gallery $gallery)
    {
        deleteImage('photos/galleries',$gallery->image);
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', __('Deleted Successfully'));
    }


}
