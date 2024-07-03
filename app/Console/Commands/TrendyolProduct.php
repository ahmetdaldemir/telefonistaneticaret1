<?php

namespace app\Console\Commands;

use App\Jobs\TrendyolCategory;
use App\Locators\VirtualMarketServiceLocator;
use App\Models\Product;
use App\Models\VirtualMarketAttribute;
use App\Models\VirtualMarketCategory;
use App\Models\VirtualMarketSetting;
use App\Modules\Trendyol\TrendyolService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class TrendyolProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:trendyolproduct';
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
        $products = Product::find(261);

            $product = $this->getProduct($products);
            $servicePost = $this->serviceParams->setProduct($product,$settings->settings['clientId']);
            $categories = $servicePost->getProduct();
            dd($servicePost->getErrors(),$categories);


    }

    public function getProduct($product)
    {

       /* $attr = '[
                            {
                              "attributeId": 338,
                              "attributeValueId": 6980
                            },
                            {
                               "attributeId": 47,
                               "customAttributeValue": "PUDRA"
                             },
                            {
                              "attributeId": 346,
                              "attributeValueId": 4290
                            }
                          ]'; */
        $attr = '[]';
        $arrayData = [
            'items' => [
                [
                    'barcode' => $product->id . '_' . $product->productCode,
                    'title' => $product->name,
                    'productMainId' => $product->id,
                    'brandId' => 12591,
                    'categoryId' => 4939,
                    'quantity' => $product->stock,
                    'stockCode' => $product->productCode,
                    'dimensionalWeight' => 1,
                    'description' => $product->description,
                    'currencyType' => 'TRY',
                    'listPrice' => $product->price,
                    'salePrice' => $product->bulkDiscountPrice,
                    'vatRate' => $product->taxRate,
                    'cargoCompanyId' => 4,
                    'deliveryOption' => [
                        'deliveryDuration' => 1,
                        'fastDeliveryType' => 'SAME_DAY_SHIPPING|FAST_DELIVERY'
                    ],
                    'images' => [
                        [
                            'url' => asset('public/image' . $product->img)
                        ]
                    ],
                    'attributes' => $attr
                ]
            ]
        ];

         return $arrayData;
    }


}
