<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(3, 1, 999),
            'description' => $this-> faker->text(),
            'image' => $this->faker->imageUrl('animals', 'dogs'),
            'quantity' => $this->faker->randomNumber(3)
        ];
    }
}
