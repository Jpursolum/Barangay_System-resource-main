<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailToUsers extends Mailable
{
    use Queueable, SerializesModels;

    public $title;

    public $body;

    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    public function build()
    {
        return $this->subject($this->title)
            ->view('emails.send_email_to_users')  // Create this view file
            ->with([
                'body' => $this->body,
            ]);
    }
}
