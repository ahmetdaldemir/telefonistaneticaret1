<?php

namespace App\Service;

use App\Locators\VirtualMarketServiceLocator;
use App\Models\VirtualMarketSetting;
use Illuminate\Support\Facades\Queue;

class TrendyolOutService
{

    public function brandSingle($name)
    {
        $data['virtualmarketId'] = 2;
        $settings = VirtualMarketSetting::where([
            'virtual_market_id' => 2, /* saas yapı için kullanılıyor !!! */
            'company_id' => 1,
        ])->first();
        $serviceSelect = new VirtualMarketServiceLocator();
        $this->serviceParams = $serviceSelect->getPlatformService($data['virtualmarketId'], $settings);
            $servicePost = $this->serviceParams->getBrandSingle($name);
            $brands = $servicePost->getBrand();
            return $brands;
    }
    public function attributeSingle($id)
    {
        $requiredAttributes = [];
        $data['virtualmarketId'] = 2;
        $settings = VirtualMarketSetting::where([
            'virtual_market_id' => 2, /* saas yapı için kullanılıyor !!! */
            'company_id' => 1,
        ])->first();
        $serviceSelect = new VirtualMarketServiceLocator();
        $this->serviceParams = $serviceSelect->getPlatformService($data['virtualmarketId'], $settings);
        $servicePost = $this->serviceParams->getAttributes($id);
        $data = $servicePost->getAttribute();
        if(!empty($data['categoryAttributes']))
        {
            $requiredAttributes = array_filter($data['categoryAttributes'], function($item) {
                return $item['required'] === true;
            });
        }
        return $requiredAttributes;
    }


}
