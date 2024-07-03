<?php

namespace app\Modules\Tosla\Request;

use app\Abstracts\PaymentMethodService;
use app\Abstracts\PaymentMethodServiceRequest;
use app\Modules\Trendyol\TrendyolService;
use app\Service\PaymentService;
use JetBrains\PhpStorm\NoReturn;

class CreatePayment extends PaymentMethodServiceRequest
{

    protected $content;
    public function __construct(PaymentMethodService $paymentService, array $data)
    {

        $this->path = 'api/Payment/ThreeDPayment';
        $this->base_uri = env('TOSLA_URL');
        $this->method = 'post';
        $this->type = 'rest';
        $this->options = [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ];
        $this->options['body'] = json_encode([
            "clientId" => $paymentService->clientId(),
            "apiUser" => $paymentService->apiKey(),
            "rnd" => $data['hashData']['rnd'],
            "timeSpan" => (string)$data['hashData']['timeSpan'],
            "hash" => $data['hashData']['hash'],
            "orderId" => $data['order_id'],
            "callbackUrl" => route('paymentCallback'),
            "description" => "açıklama",
            "amount" => $data['price'] *100,
            "currency" => 949,
        ]);

        parent::__construct($paymentService);

    }

    #[NoReturn] protected function onSuccess(): void
    {
        $content = json_decode($this->getContent(), true);
        $this->setContent($content);
    }

    protected function onError(): void
    {
        $this->getErrors();
    }


    protected function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

}
