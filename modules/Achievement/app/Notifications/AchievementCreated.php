<?php

namespace Modules\Achievement\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Modules\Achievement\Models\Achievement;

class AchievementCreated extends Notification
{
    use Queueable;

    protected Achievement $achievement;

    /**
     * Create a new notification instance.
     */
    public function __construct(Achievement $achievement)
    {
        $this->achievement = $achievement;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', 'https://laravel.com')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [
            'title' => 'Achievement Created',
            'message' => ucfirst(Auth::user()->name).' created a new achievement '.ucfirst($this->achievement->title),
            'link' => 'achievement.achievement.index',
        ];
    }
}
