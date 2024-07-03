<?php namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderStatus
{
    use SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
