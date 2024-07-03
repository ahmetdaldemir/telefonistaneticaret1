<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;

    public function __construct($subject, $content)
    {
        $this->subject = $subject;
        $this->content = $content;
    }

    public function build()
    {
        return $this->view('email.sendmail')
            ->subject($this->subject)
            ->with([
                'firstname' => $this->content->firstname,
                'lastname' => $this->content->lastname,
                'phone' => $this->content->phone,
                'email' => $this->content->email,
                'message' => $this->content->message
            ]);
    }
}
