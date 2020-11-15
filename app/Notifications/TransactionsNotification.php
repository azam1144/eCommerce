<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionsNotification extends Notification
{
    use Queueable;

    private $transactionData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transactionData)
    {
        $this->transactionData = $transactionData;
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
            ->subject('Transaction Details')
            ->greeting('Your Transaction Status')
            ->line('Your Transaction Status: '.$this->transactionData['response'])
            ->line('Your Transaction Medium: '. $this->transactionData['mode'])
            ->action('Your Orders', env('APP_URL').'/orders')
            ->line('Thanks');
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
