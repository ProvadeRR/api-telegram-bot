<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramStartNotification extends Notification
{
    use Queueable;


    /**
     * @var $chat_id
     */
    private $chat_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($chat_id)
    {
        $this->chat_id = $chat_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toTelegram($notifiable)
    {
        $url = url('/telegram');
        return TelegramMessage::create()
            ->to($this->chat_id)
            ->content("Привет! Это программа написанная на Laravel")
            ->button('Перейти на сайт', url('/'))
            ->button('Узнать информацию о себе', url('/telegram/user'));
    }


}
