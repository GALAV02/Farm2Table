<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterNotification extends Mailable
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
    
    public function build()
    {
        return $this->subject('Welcome to Farm2Table')
                    ->view('email.registermail');
    }   
}
