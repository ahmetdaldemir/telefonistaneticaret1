<?php

namespace app\Abstracts;

use App\Contracts\VirtualMarketServiceContract;
use App\Abstracts\RemoteRestRequest;


abstract class VirtualMarketServiceRequest extends RemoteRestRequest
{
    /**
     * Remote service attached to request.
     *
     * @var \App\Abstracts\VirtualMarketService
     */
    protected $virtualMarketService;


    protected $virtualMarketConfig;

    public function __construct(VirtualMarketServiceContract $virtualMarketService)
    {
        $this->virtualMarketService = $virtualMarketService;
        parent::__construct();
    }

    public function onComplete(): void
    {
        $this->virtualMarketService->addErrors(
            $this->getErrors() ?? []
        );
    }
}
