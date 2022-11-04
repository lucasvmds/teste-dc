<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Production\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $local_seeders = [

        ];
        $this->call([
            UserSeeder::class,
            ...(app()->environment() !== 'production' ? $local_seeders : []),
        ]);
    }
}
