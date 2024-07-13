<?php

namespace App\Modules\Trendyol\Request;

use App\Abstracts\VirtualMarketServiceRequest;
use App\Modules\Trendyol\TrendyolService;
use GuzzleHttp\HandlerStack;
use JetBrains\PhpStorm\NoReturn;

final class BrandSingle extends VirtualMarketServiceRequest
{

    protected $base_uri;
    protected $path;
    public $brand;
    protected $method;
    protected $type;
    protected $options = [
        'verify' => false,
        'debug' => FALSE,

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
        $stack = HandlerStack::create();
        $this->options['handler'] = $stack;

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
        $this->setBrand($content);
    }

    protected function onError(): void
    {
        $this->getErrors();
    }

    public function setBrand($brand):void
    {
        $this->brands = $brand;
    }

    public function getBrand():array
    {
        return $this->brands??[];
    }

 }
