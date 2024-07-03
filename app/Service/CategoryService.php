<?php

namespace App\Service;

use App\Models\Category;

class CategoryService
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryTree($parentId = 0)
    {
        $categories = Category::where('parent_id', $parentId)->get();

        $categoryTree = [];

        foreach ($categories as $category) {
            $categoryTree[] = [
                'id' => $category->id,
                'name' => $category->name,
                'children' => $this->getCategoryTree($category->id), // Recursive call
            ];
        }

        return $categoryTree;
    }

    public function getApiCategoryTree($parentId = 0)
    {
        // Kategorileri tablodan al
        $categories = Category::with('children')->where('parent_id',$parentId)->get();

// Gruplanmış kategorileri oluşturmak için boş bir dizi oluştur
        $groupedOptions = [];

// Her kategori için dön
        foreach ($categories as $category) {
            // Kategorinin alt kategorilerini al
            $children = $category->children;

            // Kategoriyi temsil eden bir dizi oluştur
            $categoryData = [
                'label' => $category->name,
                'options' => [],
            ];

            // Kategoriye alt kategoriler varsa, alt kategorileri diziye ekle
            foreach ($children as $child) {
                $categoryData['options'][] = [
                    'value' => $child->id,
                    'label' => $child->name,
                    // Renk veya diğer özellikleri buraya ekleyebilirsiniz
                ];
            }

            // Oluşturulan kategori verisini gruplanmış seçeneklere ekle
            $groupedOptions[] = $categoryData;
        }

// Elde edilen gruplanmış kategorileri JSON formatına dönüştür
         return $groupedOptions;
    }
}
