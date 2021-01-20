<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resource\NotificationResource;
use App\Http\Traits\ApiResponse;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    use ApiResponse;
    public function index(){
        $notifications = auth()->user()->notifications;
        return $this->apiResponse(NotificationResource::collection($notifications));
    }
}
