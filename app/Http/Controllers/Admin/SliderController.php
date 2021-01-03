<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Sliders');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {

        return view(
            'dashboard.sliders.index',
            ['sliders' => Slider::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.sliders.create');
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
            'body' => 'required|string|max:1000',
            'image' => 'required|image',
        ]);

        if ($request->has('image')) {
            $data['image'] = uploadImage('uploads', $request->image);
        }
         Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', __('Added Successfully'));
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
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request,Slider $slider)
    {
        $validator = $request->validate([
            'body' => 'required|string|max:1000',
            'image' => 'nullable|image',
        ]);
        if ($request->has('image')) {
            if ($slider->image) {
                deleteImage('uploads', $slider->image);
            }
            $validator['image'] = uploadImage('uploads', $request->image);
        }
        $slider->update($validator);
        return redirect()->route('admin.sliders.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Slider $slider)
    {
        deleteImage('uploads', $slider->image);
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', __('Deleted Successfully'));
    }

}
