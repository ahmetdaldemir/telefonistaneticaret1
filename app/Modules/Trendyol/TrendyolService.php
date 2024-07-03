<?php namespace app\Modules\Trendyol;

use App\Abstracts\VirtualMarketService;
use App\Models\VirtualMarketSetting;
use App\Modules\Trendyol\Request\Attribute;
use App\Modules\Trendyol\Request\Brand;
use App\Modules\Trendyol\Request\Category;
use App\Modules\Trendyol\Request\Product;

class TrendyolService extends VirtualMarketService
{


    public function getCategories(): Category
    {
        $method = "GET";
        $path = "product-categories";
        $type = "rest";
        return new Category($this, $method, $path, $type);
    }

    public function getAttributes($categoryId): Attribute
    {
        $method = "GET";
        $path = "product-categories/{$categoryId}/attributes";
        $type = "rest";
        return new Attribute($this, $method, $path, $type);
    }

    public function getBrands($page,$size): Brand
    {
        $method = "GET";
        $path = "brands?page={$page}&size={$size}";
        $type = "rest";
        return new Brand($this, $method, $path, $type);
    }
    public function setProduct(array $product,$supplierId): Product
    {
        $method = "POST";
        $path = "https://api.trendyol.com/sapigw/suppliers/{$supplierId}/v2/products";
        $type = "rest";
        return new Product($this, $method, $path, $type,$product);
    }

}
