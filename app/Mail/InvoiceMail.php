<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('emails.invoice',compact('details'));
        $name = 'IMSU ICT';
        $address = env('MAIL_FROM_ADDRESS');
        $subject = $this->details['subject'] !== null ? $this->details['subject'] : 'Invoice';

        // if($this->details['bcc'] !== null){
        //     return $this->view('emails.invoice')
        //             ->from($address, $name)
        //             ->replyTo($address, $name)
        //             ->subject($subject)
        //             ->bcc('eopeyemi.tv@gmail.com')
        //             ->with(['details' => $this->details]);
        // }else{
            return $this->view('emails.invoice')
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with(['details' => $this->details]);
        // }
        
        
    }
}
