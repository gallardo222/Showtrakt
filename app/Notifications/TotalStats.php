<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TotalStats extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        //dd($notifiable->stats);
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to('-1001157340449')
            // Markdown supported.
            ->content("*Showtrakt Stats*\n"
                . "------------------------"
            . "\n*Total of Users:* " . $notifiable->stats['totalusers'] .
            "\n*Total TV Shows:* " . $notifiable->stats['totalitems']['showswatched'] .
            "\n*Total Movies:* " . $notifiable->stats['totalitems']['moviesswatched'] .
            "\n*Total Comments:* " . $notifiable->stats['totalcomments'] .
            "\n*Top Movies:* \n" . "    -" .$notifiable->stats['topmovies'][0]->title .
            "\n" . "    -" . $notifiable->stats['topmovies'][1]->title .
            "\n" . "    -" . $notifiable->stats['topmovies'][2]->title .
            "\n*Top TV Shows:* \n" . "    -" .$notifiable->stats['topshows'][0]->title .
            "\n" . "    -" . $notifiable->stats['topshows'][1]->title .
            "\n" . "    -" . $notifiable->stats['topshows'][2]->title);
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
