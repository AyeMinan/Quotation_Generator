<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

   public $name;
   public $email;
   public $phone;
   public $service;
   public $estimatedCost;
   public $subject;


    public function __construct($name, $email, $phone, $service, $estimatedCost,$subject)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->service = $service;
        $this->estimatedCost = $estimatedCost;
        $this->subject = $subject;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.success',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
