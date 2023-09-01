<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = \App\Models\User::factory(1)->createOne();
        return [
            'product_name' => fake()->word(),
            'price' => fake()->randomFloat(2, 50, 500),
            'user_id' => $user->id
        ];
    }
}
