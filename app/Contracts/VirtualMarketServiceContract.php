<?php

namespace app\Contracts;

use App\Models\Category;
use App\Models\Product;

interface VirtualMarketServiceContract
{
    public function createProduct(Product $product);
    public function getCategories();


}
