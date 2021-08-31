<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
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
        $users_id = User::select('id')->get();
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(3, 1, 999),
            'description' => $this-> faker->text(),
            'image' => $this->faker->imageUrl('animals', 'dogs'),
            'quantity' => $this->faker->randomNumber(3),
            'user_id' => $this->faker->randomElement($users_id),
        ];
    }
}
