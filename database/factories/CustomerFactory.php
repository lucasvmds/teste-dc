<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'cpf' => fake()->numerify('###########'),
            'phone' => fake()->numerify('###########'),
            'street' => fake()->streetAddress(),
            'district' => fake()->streetName(),
            'city' => fake()->city(),
            'state' => fake()->state(),
        ];
    }
}
