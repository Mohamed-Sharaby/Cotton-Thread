<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\GeneralNotification;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Admins');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        return view('dashboard.notifications.index', ['notifications' => DatabaseNotification::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|array',
            'user_id.*' => 'required|numeric|exists:users,id',
            'ar_name' => 'required|string',
            'en_name' => 'required|string',
            'ar_desc' => 'required|string',
            'en_desc' => 'required|string',
        ]);
        $data = $request->except('_token');
        $users = User::whereIn('id', $data['user_id'])->get();
        Notification::send($users, new GeneralNotification($request->except(['user_id'])));
        return redirect()->back()->with('success', 'تم ارسال الاشعار بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy($id)
    {
        $notification = DatabaseNotification::findOrFail($id);
        $notification->delete();
        return 'Done';
    }
}
