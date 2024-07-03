<?php

namespace App\Listeners;

use App\Events\SendEmailEvent;
use App\Mail\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendEmailEvent  $event
     * @return void
     */
    public function handle(SendEmailEvent $event)
    {
        $to = $event->to;
        $subject = $event->subject;
        $content = $event->content;

        Mail::to($to)->send(new SendEmail($subject, $content));
    }
}
