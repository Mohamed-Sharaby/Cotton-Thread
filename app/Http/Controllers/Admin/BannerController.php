<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Banners');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {

        return view(
            'dashboard.banners.index',
            ['banners' => Banner::latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.banners.create');
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
            'ar_details' => 'required|string|max:2000',
            'en_details' => 'required|string|max:2000',
            'image' => 'required|image|max:2048',
        ]);

        Banner::create($data);
        return redirect()->route('admin.banners.index')->with('success', __('Added Successfully'));
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
    public function edit(Banner $banner)
    {
        return view('dashboard.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Banner $banner)
    {
        $validator = $request->validate([
            'ar_details' => 'required|string|max:2000',
            'en_details' => 'required|string|max:2000',
            'image' => 'nullable|image|max:2048',
        ]);
        if ($request->has('image')) {
            if ($banner->image) {
                $image = str_replace(url('/') . '/storage/','',$banner->image);
                deleteImage('photos/banners',$image);
            }
        }
        $banner->update($validator);
        return redirect()->route('admin.banners.index')->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return 'Done';
//        return redirect()->route('admin.banners.index')->with('success', __('Deleted Successfully'));
    }

}
