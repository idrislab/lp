<?php

namespace LandingPages\Notifications;

use LandingPages\LandingPage;
use LandingPages\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Subscription extends Notification
{
    use Queueable;

    protected $subscriber;
    protected $landingPage;

    /**
     * Create a new notification instance.
     *
     * @param $subscriber
     * @param $landingPage
     */
    public function __construct(Subscriber $subscriber, LandingPage $landingPage)
    {
        $this->subscriber = $subscriber;
        $this->landingPage = $landingPage;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Nova Subscrição")
            ->markdown('emails.subscription', [
                    'subscriber' => $this->subscriber,
                    'landingPage' => $this->landingPage
                ]
            );
    }

    /**
     * Get database representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->subscriber->name,
            'email' => $this->subscriber->email,
            'created_at' => $this->subscriber->created_at,
            'landingPage' => $this->landingPage->id,
            'landingPageName' => $this->landingPage->name,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
