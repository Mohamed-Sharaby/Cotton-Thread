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
            case 'refused':
                $title = getLangMessage('order_refused', $lang); $body = getLangMessage('order_refused_body', $lang); break;
            case 'accepted':
                $title = getLangMessage('order_accepted', $lang); $body = getLangMessage('order_accepted_body', $lang); break;
            case 'cancelled':
                $title = getLangMessage('order_cancelled', $lang); $body = getLangMessage('order_cancelled_body', $lang); break;
            case 'deliverd':
                $title = getLangMessage('order_deliverd', $lang); $body = getLangMessage('order_deliverd_body', $lang); break;
            default :
                $title = getLangMessage('order_new', $lang); $body = getLangMessage('order_new_body', $lang); break;
        }
        $this->data = [
            'title' => $title,
            'body' => $body,
            'status' => $status,
            'cart_id' => $cart->id,
            'category' => 'cart',
            'type' => 'cart'
        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return $this->data;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
