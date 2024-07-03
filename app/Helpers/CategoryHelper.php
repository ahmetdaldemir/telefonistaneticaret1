<?php

namespace App\Helpers;

use App\Models\Category;

class CategoryHelper
{
    public static function getCategoryPaths($categories)
    {
        $paths = [];
        foreach ($categories as $category) {
            $paths[] = self::buildPath($category);
        }
        return $paths;
    }

    private static function buildPath($category, $visited = [])
    {
        // Eğer kategori zaten ziyaret edilmişse döngü oluşmuş demektir
        if (in_array($category->id, $visited)) {
            return null; // Döngü tespit edildiği için null döndür
        }

        // Kategori ID'sini ziyaret edilenler listesine ekle
        $visited[] = $category->id;

        if (!is_null($category->parent)) {
            $parentPath = self::buildPath($category->parent, $visited);
            if (!is_null($parentPath)) {
                $path = $parentPath['name'] . ' > ' . $category->name;
                $id = $category->id;
                $name = $category->name;
                $parent = $category->parent;
            } else {
                $path = $category->name;
                $id = $category->id;
                $name = $category->name;
                $parent = $category->parent;
            }
        } else {
            $path = $category->name;
            $id = $category->id;
            $name = $category->name;
            $parent = $category->parent;
        }

        return ['id' => $id, 'name' => $path,'names' => $name, 'parent' => $parent];
    }




}
