<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     */ public function __construct($user)
    {
        $this->user = $user;
    }

    public function build(): self
    {
        return $this->subject('Verify Your Email')
            ->view('emails.verification')
            ->with(['verification_code' => $this->user->verification_code]);
    }
    
}
