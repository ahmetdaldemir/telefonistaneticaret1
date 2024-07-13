<?php

namespace app\Modules\Trendyol\Request;

use App\Abstracts\VirtualMarketServiceRequest;
use App\Modules\Trendyol\TrendyolService;
use JetBrains\PhpStorm\NoReturn;

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


    public function __construct(TrendyolService $trendyolService, $method, $path, $type,$product)
    {
        $this->path = $path;
        $this->base_uri = env('TRENDYOL_URL');
        $this->method = $method;
        $this->type = $type;
        $this->options['body'] = json_encode($product);

        $username = $trendyolService->getUsername();
        $password = $trendyolService->getPassword();
        $credentials = $username . ':' . $password;
        $base64Credentials = base64_encode($credentials);

        $this->options['headers']['Authorization'] = 'Basic '.$base64Credentials;
        $this->options['headers']['User-Agent'] = ''.$trendyolService->getClientId().' - SelfIntegration';

        //  $this->options['headers']['Authorization'] = 'Basic '.$auth.'';

        parent::__construct($trendyolService);

    }

    #[NoReturn] protected function onSuccess(): void
    {
        $content =  (array)$this->getContent();
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

    public function getContents()
    {
        return $this->content;
    }



 }
