<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class CustomDbChannel
{

    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toDatabase($notifiable);

        return $notifiable->routeNotificationFor('database')->create([
            'id' => $notification->id,

            //customize here
            'notifiable_type' => $notifiable->getMorphClass(), //<-- comes from toDatabase() Method below
            'notifiable_id'=> $notifiable->id,

            'type' => $this->types(get_class($notification)),
            'data' => $data,
            'read_at' => null,
        ]);
    }

    private function types($className){
        switch ($className) {
            case 'App\Notifications\GeneralNotification':
                return 'general_notification';
                break;
            default:
                return $className;
        }
    }
}