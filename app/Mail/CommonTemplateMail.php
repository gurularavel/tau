<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommonTemplateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string            $senderEmail,
        public string|null       $senderName,
        public string            $receiverEmail,
        public                   $subject,
        public string|array      $text,
        public null|UploadedFile $file = null,
    )
    {
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        if ($this->file) {
            return [
                Attachment::fromData(fn() => $this->file->getContent(), $this->file->getClientOriginalName()),
            ];
        }

        return [];
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.common_template',
            with: [
                'attributes' => Message::attributes(),
                'content' => $this->text,
                'sender' => [
                    'email' => $this->senderEmail,
                    'name' => $this->senderName,
                ],
                'subject' => $this->subject,
            ]
        );
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            to: $this->receiverEmail,
            replyTo: [
                new Address($this->senderEmail, $this->senderName),
            ],
            subject: $this->subject,
        );
    }
}
