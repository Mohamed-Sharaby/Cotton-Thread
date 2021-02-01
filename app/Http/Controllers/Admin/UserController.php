<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Users');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $users = User::latest()->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(UserRequest $request)
    {
        $validator = $request->validated();
        if (!isset($validator['image'])){
            $validator['image'] = null;
        }
        User::create($validator);
        return redirect(route('admin.users.index'))->with('success', 'تم الاضافة بنجاح');
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
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(UserRequest $request, User $user)
    {
        $validator = $request->validated();
        if ($request->image) {
            if ($user->image){
                $image = str_replace(url('/') . '/storage/','',$user->image);
                deleteImage('photos/users',$image);
            }
        }

        $user->update($validator);
        return redirect(route('admin.users.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(User $user)
    {
//        if (auth()->user()->id === $user->id) {
//            return redirect(route('admin.users.index'))->with('error', __('Sorry .. You cant delete your membership'));
//        }
        $user->delete();
        return 'Done';
        //return redirect(route('admin.users.index'))->with('success', 'تم الحذف بنجاح');
    }
}
