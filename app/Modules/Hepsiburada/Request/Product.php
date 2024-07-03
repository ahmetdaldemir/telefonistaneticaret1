<?php

namespace App\Modules\Hepsiburada\Request;

use App\Abstracts\VirtualMarketServiceRequest;
use app\Modules\Hepsiburada\HepsiburadaService;

final class Product extends VirtualMarketServiceRequest
{
    protected $base_uri;
    protected $path;
    public $product;
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


    public function __construct(HepsiburadaService $hepsiburadaService, $method, $path, $type,$product)
    {
        $this->path = $path;
        $this->base_uri = env('HEPSIBURADA_URL');
        $this->method = $method;
        $this->type = $type;
        $this->options['body'] = json_encode($product);

        $username = $hepsiburadaService->getUsername();
        $password = $hepsiburadaService->getPassword();
        $credentials = $username . ':' . $password;
        $base64Credentials = base64_encode($credentials);
        $this->options['header']['Authorization']= 'Basic '.$base64Credentials;
        $this->options['header']['User-Agent']= ''.$hepsiburadaService->getClientId().' - SelfIntegration';
        $this->options['header']['Content-Type']= 'application/json';
        //  $this->options['headers']['Authorization'] = 'Basic '.$auth.'';

        parent::__construct($hepsiburadaService);

    }




    #[NoReturn] protected function onSuccess(): void
    {
        $content = json_decode($this->getContent(),true);
        dd($content);
        $this->setProduct($content);
    }

    protected function onError(): void
    {
        $this->getErrors();
    }

    public function setProduct($product):void
    {
        $this->product = $product;
    }

    public function getProduct():array
    {
        return $this->product??[];
    }

}
