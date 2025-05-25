<?php

namespace Modules\Achievement\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Modules\Achievement\Models\Achievement;

class AchievementApproval extends Notification
{
    use Queueable;

    protected Achievement $achievement;
    protected string $value;

    /**
     * Create a new notification instance.
     */
    public function __construct(Achievement $achievement, string $value) {
        $this->achievement = $achievement;
        $this->value = $value;
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
            'title' => 'Achievement Approval',
            'message' => ucfirst(Auth::user()->name) . ' ' . $this->value . ' your achievement data ' . ucfirst($this->achievement->title),
            'link' => 'achievement.achievement.index',
        ];
    }
}
