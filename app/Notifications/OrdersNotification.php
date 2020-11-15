<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrdersNotification extends Notification
{
    use Queueable;

    private $orderData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
            ->subject('Order Complete')
            ->greeting('Your Order Details')
            ->line('Total: '.$this->orderData['total'])
            ->line('Discount: '.$this->orderData['discount'])
            ->line('Net Total: '.$this->orderData['subTotal'])
            ->line('Order Status: '.$this->orderData['status'])
            ->line('Contact #'.$this->orderData['mobile'])
            ->line('Your Address: '.$this->orderData['line1'])
            ->action('Your Orders', env('APP_URL').'/orders')
            ->line('🎉 Thanks for Ordering 🎉');
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
        ];
    }
}
