<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels; // Adjust this as per your User model's namespace

class BrgyUserNotification extends Mailable
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
        return $this->view('emails.notification')
            ->subject($this->title)
            ->with(['body' => $this->body]);
    }
}
