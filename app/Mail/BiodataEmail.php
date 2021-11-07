<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BiodataEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $states;
    public $department;
    public $faculty;
    public $student;
    public function __construct($states, $department, $faculty, $student)
    {
        $this->states = $states;
        $this->department = $department;
        $this->faculty = $faculty;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('emails.biodata',compact('states', 'department', 'faculty', 'student'));
        $name = 'IMSU ICT';
        $address = env('MAIL_FROM_ADDRESS');
        $subject = 'Biodata';
        
        return $this->view('emails.biodata')
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([
                        'states' => $this->states,
                        'department' => $this->department,
                        'faculty' => $this->faculty,
                        'student' => $this->student
                    ]);
    }
}
