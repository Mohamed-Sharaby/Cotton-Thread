<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\GuestMessage;
use Illuminate\Http\Request;

class GuestMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:GuestMessages');
    }



    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.guest-messages.index', compact('contacts'));
    }


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return 'Done';
    }
}
