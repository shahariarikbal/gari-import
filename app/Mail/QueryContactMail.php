<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QueryContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $queryContact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($queryContact)
    {
        $this->queryContact = $queryContact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('fontend.email.query');
    }
}
