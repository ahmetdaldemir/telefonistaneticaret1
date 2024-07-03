<?php

namespace App\Listeners;

use App\Events\OrderStatus;
use App\Mail\OrderStatusMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderStatusMail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(OrderStatus $event)
    {
        // Access the order using $event->order
        $order = $event->order;

        // Send the email
        Mail::to($order->customer->email)->cc('ahmetdaldemir@gmail.com')->bcc('erkanakin034@gmail.com')->send(new OrderStatusMail($order));
    }
}
