<?php

namespace app\Locators;



use App\Models\VirtualMarketSetting;
use app\Modules\Hepsiburada\HepsiburadaService;
use App\Modules\Trendyol\TrendyolService;

class VirtualMarketServiceLocator
{
    public function getPlatformService(int $platformCompanyId, VirtualMarketSetting $virtualMarketSetting)
    {
        switch ($platformCompanyId) {
            case '2':
                return new TrendyolService($virtualMarketSetting);
            case '3':
                return new HepsiburadaService($virtualMarketSetting);
            default:
                # code...
                break;
        }
    }
}
