<?php

namespace app\Abstracts;

use App\Contracts\VirtualMarketServiceContract;
use App\Models\Product;
use App\Models\VirtualMarketSetting;
use App\Traits\HasErrors;

abstract class VirtualMarketService implements VirtualMarketServiceContract
{

    use HasErrors;
    protected $virtualMarketSetting;

    public function __construct(VirtualMarketSetting $virtualMarketSetting)
    {
        $this->virtualMarketSetting = $virtualMarketSetting;
    }
    public function getUserConfig(): VirtualMarketSetting
    {
        return $this->virtualMarketSetting;
    }
    public function getCode(): string
    {
        $userConfig = $this->getUserConfig();
        return $userConfig->platform->code;
    }

    public function getUsername(): string
    {
        $userConfig = $this->getUserConfig();
         return $userConfig->settings['Username'];
    }
    public function getPassword()
    {
        $userConfig = $this->getUserConfig();
        return $userConfig->settings['Password'];
    }

    public function getClientId()
    {
        $userConfig = $this->getUserConfig();
        return $userConfig->settings['clientId'];
    }

    public function createProduct(Product $product)
    {
        // TODO: Implement createProduct() method.
    }
}
