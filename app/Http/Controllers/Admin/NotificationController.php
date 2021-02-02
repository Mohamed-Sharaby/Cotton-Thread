<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'users' => 'required|array',
            'title' => 'required',
            'body' => 'required',
        ]);
        $data = $request->except('_token');
        $users = User::whereIn('id', $data['users'])->get();
        foreach ($users as $user) {
            Notification::send($user, new UserNotification([
                'title' => $data['title'],
                'body' => $data['body'],
            ]));
        }

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
