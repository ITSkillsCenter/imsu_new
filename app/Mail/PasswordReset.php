<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $password;
    public function __construct($password)
    {
        $this->password=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('emails.password_reset',compact('password'));
        $name = 'IMSU ICT';
        $address = env('MAIL_FROM_ADDRESS');
        $subject = 'Password Reset';
        
        return $this->view('emails.password_reset')
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with(['password' => $this->password]);
    }
}
