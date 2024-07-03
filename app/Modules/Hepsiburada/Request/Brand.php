<?php

namespace App\Modules\Hepsiburada\Request;

use App\Abstracts\VirtualMarketServiceRequest;
use app\Modules\Hepsiburada\HepsiburadaService;

final class Brand extends VirtualMarketServiceRequest
{

    protected $base_uri;
    protected $path;
    public $brands;
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


    public function __construct(HepsiburadaService $hepsiburadaService, $method, $path, $type)
    {
        $this->path = $path;
        $this->base_uri = env('HEPSIBURADA_URL');
        $this->method = $method;
        $this->type = $type;
        $this->options['body'] = '';

        $username = $hepsiburadaService->getUsername();
        $password = $hepsiburadaService->getPassword();
        $credentials = $username . ':' . $password;
        $base64Credentials = base64_encode($credentials);
        $authorizationHeader = 'Authorization: Basic ' . $base64Credentials;
        $this->options['header'] = $authorizationHeader;
        parent::__construct($hepsiburadaService);

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

    public function setBrand($category):void
    {
        $this->brands = $category;
    }

    public function getBrand():array
    {
        return $this->brands??[];
    }

}
