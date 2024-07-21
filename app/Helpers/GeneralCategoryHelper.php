<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\VirtualMarketCategoryCompare;
use function Symfony\Component\Translation\t;

class GeneralCategoryHelper
{
    public static function getCategoryPaths($categories)
    {
        $paths = [];
        foreach ($categories as $category) {
            $paths[] = self::buildPath($category);
        }
        return $paths;
    }

    private static function buildPath($category,  $visited = [])
    {
        // Eğer kategori zaten ziyaret edilmişse döngü oluşmuş demektir
        if (in_array($category->category_id, $visited)) {
            return null; // Döngü tespit edildiği için null döndür
        }

        // Kategori ID'sini ziyaret edilenler listesine ekle
        $visited[] = $category->category_id;

        if (!is_null($category->parent)) {
            $parentPath = self::buildPath($category->parent, $visited);
            if (!is_null($parentPath)) {
                $path = $parentPath['name'] . ' > ' . $category->name;
                $id = $category->category_id;
                $name = $category->name;
                $parent = $category->parent;

            } else {
                $path = $category->name;
                $id = $category->category_id;
                $name = $category->name;
                $parent = $category->parent;


            }
        } else {
            $path = $category->name;
            $id = $category->category_id;
            $name = $category->name;
            $parent = $category->parent;

        }

        return ['id' => $id, 'name' => $path, 'names' => $name, 'parent' => $parent];
    }



}
