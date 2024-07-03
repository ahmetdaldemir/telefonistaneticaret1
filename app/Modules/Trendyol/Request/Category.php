<?php

namespace app\Modules\Trendyol\Request;

use App\Abstracts\VirtualMarketServiceRequest;
use App\Modules\Trendyol\TrendyolService;
use JetBrains\PhpStorm\NoReturn;

final class Category extends VirtualMarketServiceRequest
{

    protected $base_uri;
    protected $path;
    public $categorys;
    protected $method;
    protected $type;
    protected $options = [
        'verify' => false,
        'debug' => TRUE,
        'timeout' => 10,
        'connect_timeout' => 1.5,
        'decode_content' => false,
        'headers' => [
            'content-type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ];


    public function __construct(TrendyolService $trendyolService, $method, $path, $type)
    {
        $this->path = $path;
        $this->base_uri = env('TRENDYOL_URL');
        $this->method = $method;
        $this->type = $type;
        $this->options['body'] = '';

        $username = $trendyolService->getUsername();
        $password = $trendyolService->getPassword();
        $credentials = $username . ':' . $password;
        $base64Credentials = base64_encode($credentials);
        $authorizationHeader = 'Authorization: Basic ' . $base64Credentials;
        $this->options['header'] = $authorizationHeader;
        parent::__construct($trendyolService);

    }


    #[NoReturn] protected function onSuccess(): void
    {
        $content = json_decode($this->getContent(),true);
        $this->setCategory($content);
    }

    protected function onError(): void
    {
        $this->getErrors();
    }

    public function setCategory($category):void
    {
        $this->categorys = $category;
    }

    public function getCategory():array
    {
        return $this->categorys;
    }

    private function setOrderId(string $orderId)
    {
        $this->orderId = $orderId;
    }


    public function getOrderId(): string
    {
        return $this->orderId;
    }
 }
