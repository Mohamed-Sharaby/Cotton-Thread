<?php

namespace App\Notifications;

use App\Http\Traits\FireBase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    use Queueable;
    protected $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CustomDbChannel::class,FireBaseChannel::class];
    }

    /**
     * @param $notifiable
     */
    public function toFireBase($notifiable){
        if(app()->getLocale() == 'ar'){
            $data['title'] = $this->data['ar_name'];
            $data['body'] = $this->data['ar_desc'];
        }else{
            $data['title'] = $this->data['en_name'];
            $data['body'] = $this->data['en_desc'];
        }
        FireBase::notification($notifiable,$data['title'],$data['body'],$data);
    }


    /**
     * @param $notifiable
     * @return mixed
     */
    public function toDatabase($notifiable)
    {
        return $this->data;
    }
}
