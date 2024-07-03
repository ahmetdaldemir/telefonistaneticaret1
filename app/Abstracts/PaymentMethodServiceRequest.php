<?php

namespace app\Abstracts;

use app\Contracts\PaymentMethodServiceContract;
use App\Contracts\VirtualMarketServiceContract;
use App\Abstracts\RemoteRestRequest;


abstract class PaymentMethodServiceRequest extends RemoteRestRequest
{
    /**
     * Remote service attached to request.
     *
     * @var \App\Abstracts\PaymentMethodService
     */
    protected $paymentMethodService;


    protected $paymentMethodConfig;

    public function __construct(PaymentMethodServiceContract $paymentMethodService)
    {
        $this->paymentMethodService = $paymentMethodService;
        parent::__construct();
    }

    public function onComplete(): void
    {
        $this->paymentMethodService->addErrors(
            $this->getErrors() ?? []
        );
    }
}
