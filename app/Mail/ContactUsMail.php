<?php

namespace App\Mail;

use Hamcrest\Arrays\IsArray;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = (object) $data;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $name = $this->data->full_name;
        $address = 'support@imsu.edu.ng';
        $subject = 'General Support';
        
        return $this->view('emails.contact-us')
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([
                        'full_name' => $this->data->full_name,
                        'email' => $this->data->email,
                        'body' => $this->data->body,
                        'phone_number' => $this->data->phone_number
                    ]);
    }
}
