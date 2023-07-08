<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Product::class;

    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'sort_description' => $this->faker->text(200),
            'long_description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10,500),
            'sale_price' => $this->faker->numberBetween(10,500),
            'sku' => 'DIGI'.$this->faker->unique()->numberBetween(100,500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100,200),
            'image' => 'digital_'.$this->faker->unique()->numberBetween(1,22),
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
