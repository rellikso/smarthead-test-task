<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // Тестовый клиент
        $testCustomer = Customer::factory()->create([
            'name' => 'Test Customer',
            'phone' => '+380501234567',
            'email' => 'customer@example.com',
        ]);
        $testCustomer->assignRole('customer');

        // Остальные клиенты
        Customer::factory(20)->create()->each(function ($customer) {
            $customer->assignRole('customer');
        });
    }
}
