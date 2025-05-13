<?php

namespace Modules\Achievement\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Modules\Achievement\Models\Competition;

class CompetitionApproval extends Notification
{
    use Queueable;

    protected Competition $competition;
    protected string $value;

    /**
     * Create a new notification instance.
     */
    public function __construct(Competition $competition, string $value) {
        $this->competition = $competition;
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
            'title' => 'Competition Approval',
            'message' => ucfirst(Auth::user()->name) . ' ' . $this->value . ' your competition data ' . ucfirst($this->competition->name),
            'link' => 'achievement.competition.index',
        ];
    }
}
