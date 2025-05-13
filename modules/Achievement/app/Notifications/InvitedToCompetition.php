<?php

namespace Modules\Achievement\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Modules\Achievement\Models\Competition;

class InvitedToCompetition extends Notification
{
    use Queueable;

    protected Competition $competition;

    /**
     * Create a new notification instance.
     */
    public function __construct(Competition $competition) {
        $this->competition = $competition;
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
            'title' => 'Competition Invitation',
            'message' => ucfirst(Auth::user()->name) . ' invited you to competition ' . ucfirst($this->competition->name),
            'link' => 'achievement.competition.index',
        ];
    }
}
