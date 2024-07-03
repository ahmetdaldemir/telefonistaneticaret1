<?php

namespace app\Modules\Tosla\Request;

use app\Abstracts\PaymentMethodService;
use app\Abstracts\PaymentMethodServiceRequest;
use app\Modules\Trendyol\TrendyolService;
use app\Service\PaymentService;
use JetBrains\PhpStorm\NoReturn;

class DoPayment extends PaymentMethodServiceRequest
{

    protected $content;

    public function __construct(PaymentMethodService $paymentService, array $data)
    {
        $this->path = 'api/Payment/ProcessCardForm';
        $this->base_uri = env('TOSLA_URL');
        $this->method = 'post';
        $this->type = 'rest';
        $this->options = [
            'headers' => [
                'Content-Type' => 'multipart/form-data'
            ],
        ];
        $this->options['body'] = json_encode([
            "ThreeDSessionId" => $data['ThreeDSessionId'],
            "CardHolderName" => $data['creditData']['cardName'],
            "CardNo" => $data['creditData']['cardNumber'],
            "ExpireDate" => $data['creditData']['exp'],
            "Cvv" => $data['creditData']['cvv'],
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
