<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserfollowNotification extends Notification
{
    use Queueable;
    public $last_record;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($last_record)
    {
        //print_r($insert);exit;
        $this->last_record = $last_record;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Welcome '.$this->last_record->name)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray($notifiable)
    {
        return [
            'name'=> $this->last_record->name,
            'email'=> $this->last_record->email,
            'phone'=> $this->last_record->number,
            'created'=> $this->last_record->created_at ,
        ];
    }
}
