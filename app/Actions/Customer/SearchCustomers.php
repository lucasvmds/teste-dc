<?php

declare(strict_types=1);

namespace App\Actions\Customer;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class SearchCustomers
{
    public static function run(string $search): Collection
    {
        return Customer::query()
            ->orderBy('name')
            ->where('name', 'LIKE', "%$search%")
            ->get([
                'id',
                'name',
                'phone',
                'street',
            ]);
    }
}