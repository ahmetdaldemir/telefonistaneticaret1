<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\VirtualMarketCategoryCompare;
use function Symfony\Component\Translation\t;

class CategoryHelper
{
    public static function getCategoryPaths($categories)
    {
        $paths = [];
        foreach ($categories as $category) {
            $trendyolCategoryCompareName = self::trendyolCategoryCompare($category->id);
            $paths[] = self::buildPath($category, $trendyolCategoryCompareName->virtual_market_category_id ?? 0);
        }
        return $paths;
    }

    private static function buildPath($category, $virtual_market_category_id = 0, $visited = [])
    {
        // Eğer kategori zaten ziyaret edilmişse döngü oluşmuş demektir
        if (in_array($category->id, $visited)) {
            return null; // Döngü tespit edildiği için null döndür
        }

        // Kategori ID'sini ziyaret edilenler listesine ekle
        $visited[] = $category->id;

        if (!is_null($category->parent)) {
            $parentPath = self::buildPath($category->parent, $virtual_market_category_id, $visited);
            if (!is_null($parentPath)) {
                $path = $parentPath['name'] . ' > ' . $category->name;
                $id = $category->id;
                $name = $category->name;
                $parent = $category->parent;
                $virtual_market_category_id = self::trendyolCategoryCompare($category->id);

            } else {
                $path = $category->name;
                $id = $category->id;
                $name = $category->name;
                $parent = $category->parent;
                $virtual_market_category_id = self::trendyolCategoryCompare($category->id);


            }
        } else {
            $path = $category->name;
            $id = $category->id;
            $name = $category->name;
            $parent = $category->parent;

        }

        return ['id' => $id, 'name' => $path, 'names' => $name, 'parent' => $parent, 'virtual_market_category_id' => $virtual_market_category_id];
    }


    public static function trendyolCategoryCompare($id)
    {
        $xx = VirtualMarketCategoryCompare::where('category_id', $id)->where('virtual_market_setting_id', 1)->first();
        if (!$xx) {
            return 0;
        }
        return $xx->virtual_market_category_id;
    }
}
