<?php

namespace App\Console\Commands;

use App\Jobs\TrendyolCategory;
use App\Locators\VirtualMarketServiceLocator;
use App\Models\Product;
use App\Models\VirtualMarketAttribute;
use App\Models\VirtualMarketCategory;
use App\Models\VirtualMarketSetting;
use App\Modules\Trendyol\TrendyolService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class TrendyolUpdateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:trendyolupdateproduct';
    public $serviceParams;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle(): void
    {
        $data['virtualmarketId'] = 2;
        $settings = VirtualMarketSetting::where([
            'virtual_market_id' => 2, /* saas yapı için kullanılıyor !!! */
            'company_id' => 1,
        ])->first();
        $serviceSelect = new VirtualMarketServiceLocator();
        $this->serviceParams = $serviceSelect->getPlatformService($data['virtualmarketId'], $settings);
        $products = Product::all();

        foreach ($products as $product)
        {
            $servicePost = $this->serviceParams->updatePriceAndInventory($product, $settings->settings['clientId']);
            $categories = $servicePost->getContents();
            dd($servicePost->getErrors(), $categories);
        }

    }


}
