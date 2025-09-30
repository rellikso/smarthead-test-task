<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'name'  => fake()->name(),
            'phone' => fake()->unique()->e164PhoneNumber(), // формат +380501234567
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
