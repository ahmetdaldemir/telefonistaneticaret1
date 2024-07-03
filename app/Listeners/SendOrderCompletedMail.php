<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCompletedMail;

class SendOrderCompletedMail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(OrderCompleted $event)
    {
        // Access the order using $event->order
        $order = $event->order;

        // Send the email
        Mail::to($order->customer->email)->cc('ahmetdaldemir@gmail.com')->bcc('erkanakin034@gmail.com')->send(new OrderCompletedMail($order));
    }
}
