<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $firstname;
    public $lastname;
    public $emailaddress;
    public $phone;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     * 
     *  
     */
    public function __construct($firstname, $lastname, $emailaddress, $phone, $message)
    {
        // 
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->emailaddress = $emailaddress;
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact')
        ->subject('New Contact Form Submission')
                        ->with([
                        'firstname' => $this->firstname,
                        'lastname' => $this->lastname,
                        'emailaddress' => $this->emailaddress,
                        'phone' => $this->phone,
                        'message' => $this->message,
                    ]);
    }
}
