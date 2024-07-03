<?php

use App\Models\Category;
use App\Models\EcommerceSetting;

if (!function_exists('custom_function')) {
    function printCategoryMenu($parentId = 0)
    {
        $categories = Category::where('parent_id', $parentId)->get();

        if ($categories->isNotEmpty()) {
            foreach ($categories as $category) {
                echo '<li><a href="#">' . $category->name . '</a>';

                // Alt kategorileri kontrol et ve gerekirse alt menüyü oluştur
                $children = Category::where('parent_id', $category->id)->get();
                if ($children->isNotEmpty()) {
                    echo '<ul>';
                    foreach ($children as $child) {
                        echo '<li><a href="#">' . $child->name . '</a></li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
        }
    }
}




if (!function_exists('page_function')) {


    function pageList($category)
    {
       return \App\Models\Page::where('category', $category)->get();
     }

}



if (!function_exists('ecommerce_setting')) {
    function ecommerce_setting($value)
    {
        return EcommerceSetting::where('name',$value)->first();
    }
}




if (!function_exists('cart')) {
    function cart()
    {
        $cart = new \Amocart\Cart\Cart();
        return $cart->all();
    }

}



