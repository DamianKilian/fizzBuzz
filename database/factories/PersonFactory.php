<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'tel' => fake()->numberBetween(100000000, 999999999),
            'sms_sub' => rand(0, 1) === 1 ? true : false,
            'email_sub' => rand(0, 1) === 1 ? true : false,
        ];
    }
}
