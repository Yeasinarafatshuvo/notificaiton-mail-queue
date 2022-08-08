<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestEnrollMent extends Notification implements ShouldQueue
{
    use Queueable;
    private $enrollMentData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($enrollMentData)
    {
        $this->enrollMentData = $enrollMentData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line($this->enrollMentData['body'])
                    ->action($this->enrollMentData['enrolmentText'], $this->enrollMentData['url'])
                    ->line($this->enrollMentData['thankyou']);
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
           'body' => $this->enrollMentData['body'],
           'enrolmentText' => $this->enrollMentData['enrolmentText'],
           'time' => $this->enrollMentData['thankyou']
        ];
    }
}
