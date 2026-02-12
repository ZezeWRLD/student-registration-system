<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentMail extends Notification
{
    use Queueable;
        public $student;
        public $action;
    /**
     * Create a new notification instance.
     */
    public function __construct($student, $action)
    {
        $this->student = $student;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = match ($this->action) {
            'created' => 'New Student Created: ' . $this->student->name,
            'updated' => 'Student Information Updated: '. $this->student->name,
            'deleted' => 'Student Information Deleted: '. $this->student->name,
            default => 'Student Notification',
        };

        return (new MailMessage)
            ->subject($subject)
            ->markdown('mail.student-notification', [
                'student' => $this->student,
                'action' => $this->action,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
