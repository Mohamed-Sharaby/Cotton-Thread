<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\NotificationsCollection;
use App\Http\Traits\ApiResponse;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    use ApiResponse;
    public function index(){
        $notifications = auth()->user()->unreadNotifications()->paginate(10);
        return $this->apiResponse(new NotificationsCollection($notifications));
    }
}
