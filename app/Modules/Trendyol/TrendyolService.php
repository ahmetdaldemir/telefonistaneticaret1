<?php namespace app\Modules\Trendyol;

use App\Abstracts\VirtualMarketService;
use App\Models\VirtualMarketSetting;
use App\Modules\Trendyol\Request\Attribute;
use App\Modules\Trendyol\Request\Brand;
use App\Modules\Trendyol\Request\BrandSingle;
use App\Modules\Trendyol\Request\Category;
use App\Modules\Trendyol\Request\Product;
use App\Modules\Trendyol\Request\UpdateSingleProductTrendyol;
use Illuminate\Http\Request;

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

    public function getProduct(array $product,$supplierId): Product
    {
        $method = "POST";
        $path = "https://api.trendyol.com/sapigw/suppliers/{$supplierId}/v2/products";
        $type = "rest";
        return new Product($this, $method, $path, $type,$product);
    }

    public function updatePriceAndInventory(Product $product,$supplierId): UpdateSingleProductTrendyol
    {
        $method = "POST";
        $path = "suppliers/{$supplierId}/products/price-and-inventory";
        $type = "rest";
        $payload = [
            "items" => [
                [
                    "barcode" => $product->barcode,
                    "quantity" => $product->quantity,
                    "salePrice" => $product->salePrice,
                    "listPrice" => $product->listPrice
                ]
            ]
        ];

        return new UpdateSingleProductTrendyol($this, $method, $path, $type,$payload);
    }

    public function getBrandSingle($name): BrandSingle
    {
        $method = "GET";
        $path = "brands/by-name?name={$name}";
        $type = "rest";
        return new BrandSingle($this, $method, $path, $type);
    }

}
