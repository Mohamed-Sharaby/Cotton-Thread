<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Branches');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $branches = Branch::all();
        return view('dashboard.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required',
        ]);

        Branch::create($validator);
        return redirect(route('admin.branches.index'))->with('success', 'تم الاضافة بنجاح');
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
    public function edit(Branch $branch)
    {
        return view('dashboard.branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Branch $branch)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required',
        ]);

        $branch->update($validator);
        return redirect(route('admin.branches.index'))->with('success', 'تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect(route('admin.branches.index'))->with('success', 'تم الحذف بنجاح');
    }
}
