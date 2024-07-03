<?php

namespace app\Service;

use App\Locators\PaymentServiceLocator;
use App\Models\PaymentMethodSetting;

class PaymentService
{
    public function process()
    {
        $settings = PaymentMethodSetting::where([
            'paymentCode' => 'tosla', /* saas yapı için kullanılıyor !!! */
            'company_id' => 1,
        ])->first();
        $serviceSelect = new PaymentServiceLocator();
        return $serviceSelect->getPlatformService($settings->paymentCode, $settings);
    }
}
