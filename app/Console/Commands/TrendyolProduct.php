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
        $products = Product::find(299);

            $product = $this->getProduct($products);
            $servicePost = $this->serviceParams->setProduct($product,$settings->settings['clientId']);
            $response = $servicePost->getContents();
            if(is_array($response))
            {
               print_r($response);
            }else{
                $response = json_decode($response,TRUE);
                if($response['errors']){
                    dd($response['errors'][0]['message']);
                }else{
                    dd($response);
                }
            }


    }

    public function getProduct($product)
    {
        $brandID = $product->productVirtualSetting[0]['brand_id']['trendyol'][0];

        $attributeIds = $product->productVirtualSetting[0]['attribute_id']['trendyol'];
        $attributeValues = $product->productVirtualSetting[0]['attribute_value_id']['trendyol'];

        $attributes = [];

        foreach ($attributeIds as $key => $attribute) {
            if (isset($attributeValues[$key])) {
                $attributes[] = [
                    'attributeId' => $attribute['\'Id'],
                    'attributeValueId' => $attributeValues[$key]['\'Id']
                ];
            }
        }

        $arrayData = [
            'items' => [
                [
                    'barcode' => $product->id . '_' . $product->productCode,
                    'title' => $product->name,
                    'productMainId' => $product->id,
                    'brandId' => $brandID,
                    'categoryId' => 5501,
                    'quantity' => $product->stock,
                    'stockCode' => $product->productCode,
                    'dimensionalWeight' => 1,
                    'description' => $product->description??'Hazirlanmaktadir',
                    'currencyType' => 'TRY',
                    'listPrice' => $product->price,
                    'salePrice' => $product->bulkDiscountPrice,
                    'vatRate' => $product->taxRate,
                    'cargoCompanyId' => 4,

                    'images' => [
                        [
                            'url' => asset('public/image' . $product->img)
                        ]
                    ],
                    'attributes' => $attributes,
                ]
            ]
        ];

        return $arrayData;
    }


}
