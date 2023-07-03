<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
   
    use Queueable, SerializesModels;
    public $otp;
    public $mailData;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($mailData)
    {
        
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New appointment booked',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail',
        );
    }

    public function build()
    {
        return $this->from('info@attendance.klickwash.net')
            ->view('mail')
            ->subject('New appointment booked
            ');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
