<?php

namespace App\Console\Commands;

use App\Models\MonthlyDeal;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MounthDeal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mounth:deal';

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
        $firstDayOfThisMonth = Carbon::now()->startOfMonth();
        MonthlyDeal::whereDate('created_at', '<', $firstDayOfThisMonth)->delete();
    }
}
