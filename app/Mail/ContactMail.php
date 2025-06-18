<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $firstname;
    public $lastname;
    public $emailaddress;
    public $phone;
    public $userMessage;

    /**
     * Create a new message instance.
     */
    public function __construct($firstname, $lastname, $emailaddress, $phone, $userMessage)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->emailaddress = $emailaddress;
        $this->phone = $phone;
        $this->userMessage = $userMessage;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->replyTo($this->emailaddress, $this->firstname . ' ' . $this->lastname)
                    ->subject('New Contact Form Submission: ' . $this->firstname . ' ' . $this->lastname)
                    ->view('emails.contact')
                    ->with([
                        'firstname' => $this->firstname,
                        'lastname' => $this->lastname,
                        'emailaddress' => $this->emailaddress,
                        'phone' => $this->phone,
                        'message' => $this->userMessage,
                    ]);
    }
}