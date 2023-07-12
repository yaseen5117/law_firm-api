<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserUploadedRequiredDocs extends Notification
{
    use Queueable;
    protected $user;
    protected $siteUrl;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($user, $siteUrl)
    {
        $this->user = $user;
        $this->siteUrl = $siteUrl;
    }

    // Rest of the class...

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                ->subject('User has Uploaded Required Documents')
                ->greeting('Hi Admin,')
                ->line('A user has uploaded his required documents. Please click the link below to review.')
                ->action('See Documents', "{$this->siteUrl}/{$this->user->id}")
                ->line('Thank you.');
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
