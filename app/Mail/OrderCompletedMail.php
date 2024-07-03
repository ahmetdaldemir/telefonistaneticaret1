<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('SİPARİŞ DURUMU - '.$this->order->status())->from(''.env('MAIL_USERNAME').'', ''.env('APP_NAME').'')->markdown('emails.orders.completed')
            ->with([
                'order' => $this->order,
                'footer' => ''.env('APP_NAME').' © ' . date('Y') . '. Tüm hakları saklıdır.',
            ]);
    }
}
