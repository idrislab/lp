<?php

namespace LandingPages\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Subscribed extends Notification
{
    use Queueable;

    private $landingPage;
    private $subscriber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($landingPage, $subscriber)
    {
        $this->landingPage = $landingPage;
        $this->subscriber = $subscriber;
    }

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
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $viewName = 'pages.' . $this->landingPage->client->id . '.' . $this->landingPage->id . '.email';

        return (new MailMessage)
            ->from($this->landingPage->email, $this->landingPage->client->name)
            ->subject($this->landingPage->client->name)
            ->markdown($viewName, [
                    'subscriber' => $this->subscriber,
                    'landingPage' => $this->landingPage
                ]
            );
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
