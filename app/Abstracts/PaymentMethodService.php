<?php

namespace app\Abstracts;

use App\Contracts\PaymentMethodServiceContract;
use App\Models\PaymentMethodSetting;
use App\Traits\HasErrors;

class PaymentMethodService implements PaymentMethodServiceContract
{


    use HasErrors;
    protected $paymentMethodService;

    public function __construct(PaymentMethodSetting $paymentMethodService)
    {
        $this->paymentMethodService = $paymentMethodService;
    }

    public function getPaymetnMethodSetting(): PaymentMethodSetting
    {
        return $this->paymentMethodService;
    }

    public function paymentCode()
    {
        $paymentMethodConfig = $this->getPaymetnMethodSetting();
        return $paymentMethodConfig->paymentCode;
    }

    public function apiKey()
    {
        $paymentMethodConfig = $this->getPaymetnMethodSetting();
        return $paymentMethodConfig->apiKey;
    }

    public function clientId()
    {
        $paymentMethodConfig = $this->getPaymetnMethodSetting();
        return $paymentMethodConfig->clientId;
    }

    public function apiSecret()
    {
        $paymentMethodConfig = $this->getPaymetnMethodSetting();
        return $paymentMethodConfig->apiSecret;
    }
}
