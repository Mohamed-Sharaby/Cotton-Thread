<?php

namespace App\Notifications;

use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CartStatusNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $cart;
    public $data;

    public function __construct(Cart $cart, $status)
    {
        $lang = $cart->user->lang;
        switch ($status) {
            case 'confirmed':
                $title = getLangMessage('order_confirmed', $lang); $body = getLangMessage('order_confirmed_body', $lang); break;
            case 'finished':
                $title = getLangMessage('order_finished', $lang); $body = getLangMessage('order_finished_body', $lang); break;
            case 'refused':
                $title = getLangMessage('order_refused', $lang); $body = getLangMessage('order_refused_body', $lang); break;
            case 'canceled':
                $title = getLangMessage('order_cancelled', $lang); $body = getLangMessage('order_cancelled_body', $lang); break;
            default :
                $title = getLangMessage('order_new', $lang); $body = getLangMessage('order_new_body', $lang); break;
        }

        $this->data = [
            'title' => $title,
            'body' => $body,
            'status' => $status,
            'cart_id' => $cart->id,
            'category' => 'cart',
            'type' => 'cart_status'
        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return
     */
    public function toDatabase($notifiable)
    {
        return $this->data;
    }


}
