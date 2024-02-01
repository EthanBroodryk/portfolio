<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;class WelcomeMail extends Mailable
{
use Queueable, SerializesModels;/**
* Create a new message instance.
*/


public function __construct(private string $userEmail, private string  $userContactNumber, private string $body)
{
}/**
* Get the message envelope.
*/
public function envelope(): Envelope
{
return new Envelope(
subject: 'Email From Your Site!',
);
}/**
* Get the message content definition.
*/
public function content(): Content
{
    return new Content(
        view: 'email',
        with: [
            'userEmail' => $this->userEmail,
            'userContactNumber' => $this->userContactNumber,
            'body' => $this->body,
        ],


    );
}/**
* Get the attachments for the message.
*
* @return array<int, \Illuminate\Mail\Mailables\Attachment>
*/
public function attachments(): array
{
return [];
}
}