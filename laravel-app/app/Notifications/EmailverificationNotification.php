<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Otp;


class EmailverificationNotification extends Notification
{
    use Queueable;
    public $message;   //دي الرسالة
    public $subject;
    public $fromemail; // ده الايميل اللي هنرسل منه
    public $mailer;    // الايميل اللي احنا بنستخدمه
    public $otp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message ="Use the below code for verification process";
        $this->subject ="Verification Need";
        $this->fromemail ="Test Your email";
        $this->mailer ="smtp";
        $this->otp =new otp;
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
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $otp = $this->otp->generate($notifiable->email,6,1);
        return (new MailMessage)
                    ->mailer('smtp')
                    ->subject($this->subject)
                    ->greeting('Hello '.$notifiable->first_Name)
                    ->Line($this->message)
                    ->Line('Code: '.$otp->token);
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
