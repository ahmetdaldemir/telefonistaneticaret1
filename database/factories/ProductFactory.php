<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;

use App\Models\Version;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */

class ProductFactory extends Factory
{


    public function definition()
    {
        return [
            'bulkDiscountPrice' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->paragraph,
            'img' => $this->faker->imageUrl(640, 480, 'products'),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'productCode' => $this->faker->bothify('##-??'),
            'stock' => rand(1,19),
            'tags' => $this->faker->name,
            'taxRate' => 18,
            'brand' => Brand::inRandomOrder()->first()->id,
            'category' => Category::inRandomOrder()->first()->id,
            'version' => Version::inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'slug' => Str::slug($this->faker->name),
            'company_id' => 1,

        ];
    }

}
