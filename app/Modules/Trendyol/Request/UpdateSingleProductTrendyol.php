<?php

namespace App\Modules\Trendyol\Request;

use app\Abstracts\VirtualMarketServiceRequest;
use app\Modules\Trendyol\TrendyolService;
use JetBrains\PhpStorm\NoReturn;

class UpdateSingleProductTrendyol extends VirtualMarketServiceRequest
{


    /**
     * @param TrendyolService $param
     * @param string $method
     * @param string $path
     * @param string $type
     * @param array[] $payload
     */



    protected $base_uri;
    protected $path;
    public array $payload;
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

    public function __construct(TrendyolService $trendyolService, string $method, string $path, string $type, array $payload)
    {
        $this->path = $path;
        $this->base_uri = env('TRENDYOL_URL');
        $this->method = $method;
        $this->type = $type;
        $this->options['body'] = json_encode($payload);

        $username = $trendyolService->getUsername();
        $password = $trendyolService->getPassword();
        $credentials = $username . ':' . $password;
        $base64Credentials = base64_encode($credentials);
        $this->options['header']['Authorization']= 'Basic '.$base64Credentials;
        $this->options['header']['User-Agent']= ''.$trendyolService->getClientId().' - SelfIntegration';
        $this->options['header']['Content-Type']= 'application/json';
        //  $this->options['headers']['Authorization'] = 'Basic '.$auth.'';

        parent::__construct($trendyolService);
    }


    #[NoReturn] protected function onSuccess(): void
    {
        $content = json_decode($this->getContent(),true);
        $this->setContents($content);
    }

    protected function onError(): void
    {
        $this->getErrors();
    }

    public function setContents($content):void
    {
        $this->content = $content;
    }

    public function getContents():array
    {
        return $this->content;
    }


}