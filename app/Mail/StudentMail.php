<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

//File generated with artisan command: php artisan make:mail *filename*
class StudentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $action;
    /**
     * Create a new message instance.
     */
    public function __construct($student, $action)
    {
        $this->student = $student;
        $this->action = $action;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = match ($this->action) {
            'created' => 'New Student Created: ' . $this->student->name,
            'updated' => 'Student Information Updated: '. $this->student->name,
            'deleted' => 'Student Information Deleted: '. $this->student->name,
            default => 'Student Notification',
        };
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.student-notification',
            with: [
                'student' => $this->student,
                'action' => $this->action,
            ],
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
