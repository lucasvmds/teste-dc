<?php

declare(strict_types=1);

namespace Database\Seeders\Develop;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Customer::factory(10)
            ->create();
    }
}
