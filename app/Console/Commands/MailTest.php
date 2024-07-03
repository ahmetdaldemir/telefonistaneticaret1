<?php

namespace App\Console\Commands;

use App\Events\OrderCompleted;
use App\Models\Order;
use Illuminate\Console\Command;

class MailTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $order = Order::find(51);
        event(new OrderCompleted($order));
    }
}
