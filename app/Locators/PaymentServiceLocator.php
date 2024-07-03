<?php namespace app\Locators;

use App\Models\PaymentMethodSetting;
use App\Modules\Tosla\ToslaService;

class PaymentServiceLocator
{
    public function getPlatformService(string $paymentCode, PaymentMethodSetting $paymentMethodSetting)
    {
        switch ($paymentCode) {
            case 'tosla':
                return new ToslaService($paymentMethodSetting);
            case 'akbank':
                return new HepsiBuradaService($virtualMarketSetting);
            default:
                # code...
                break;
        }
    }
}
