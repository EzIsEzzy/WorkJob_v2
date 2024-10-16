<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $is_accepted;
    public $applicant;

    /**
     * Create a new message instance.
     */
    public function __construct($is_accepted, $applicant)
    {
        //
        $this->is_accepted= $is_accepted;
        $this->applicant = $applicant;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Status Mail',
        );
    }

    /**
     * Get the message content definition.
     */

     public function build()
     {
        return $this->view('emails.application_status')
                    ->subject('Job Application Status')
                    ->with([
                        'is_accepted' => $this->is_accepted,
                        'applicant' => $this->applicant
                    ]);
     }
    public function content(): Content
    {
        return new Content(
            view: 'emails.application_status',
        );
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
