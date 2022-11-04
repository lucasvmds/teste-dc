<?php

declare(strict_types=1);

namespace Database\Seeders\Production;

use App\Enums\UserGroup;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::query()
            ->create([
                'name' => 'Developer',
                'group' => UserGroup::ADMIN,
                'email' => 'dev@developer',
                'password' => Hash::make('Ab123456789@'),
            ]);
    }
}
