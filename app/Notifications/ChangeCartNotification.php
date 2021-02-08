<?php

namespace App\Notifications;

use App\Http\Traits\FireBase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeCartNotification extends Notification
{
    use Queueable;

    protected $cart;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($cart)
    {
        $this->cart = $cart;
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
            $data['title'] = sprintf("تم تغير حالة الطلب %s",$this->cart->id);
            $data['body'] = sprintf("تم تغير حالة الطلب %s الى %s",$this->cart->id,__($this->cart->status));
        }else{
            $data['title'] = sprintf("status form cart %s changed",$this->cart->id);
            $data['body'] = sprintf("status for cat %s changed to %s",$this->cart->id,$this->cart->status);
        }
        FireBase::notification($notifiable,$data['title'],$data['body'],$data);
    }

    /**
     * @param $notifiable
     * @return mixed
     */
    public function toDatabase($notifiable)
    {
//        if(app()->getLocale() == 'ar'){
//            $this->cart['title'] = sprintf("تم تغير حالة الطلب %s",$this->cart->id);
//            $this->cart['body'] = sprintf("تم تغير حالة الطلب %s الى %s",$this->cart->id,__($this->cart->status));
//        }else{
//            $this->cart['title'] = sprintf("status form cart %s changed",$this->cart->id);
//            $this->cart['body'] = sprintf("status for cat %s changed to %s",$this->cart->id,$this->cart->status);
//        }
        return $this->cart;
    }
}
