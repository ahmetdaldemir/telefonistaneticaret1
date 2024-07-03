<?php

namespace app\Listeners;

use Amocart\Cart\Cart;
use App\Events\OrderRepair as CheckoutOrderRepair;
use App\Models\OrderHistory;
use App\Models\OrderProduct;

class OrderRepair
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
     * @param \App\Events\OrderRepair $event
     * @return void
     */
    public function handle(CheckoutOrderRepair $event)
    {

        $cart = new Cart();
        foreach ($cart->all()['items'] as $item) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $event->order->id;
            $orderProduct->product_id = $item->product_id;
            $orderProduct->quantity = $item->quantity;
            $orderProduct->price = $item->price;
            $orderProduct->save();
        }

        $orderHistories = new OrderHistory();
        $orderHistories->order_id =  $event->order->id;
        $orderHistories->value =   'PAYMENT_WAIT';
        $orderHistories->save();

    }

}
