<?php

declare(strict_types=1);

namespace App\Actions\Customer;

use App\Models\Customer;

class CreateNewCustomer
{
    public static function run(array $data): int
    {
        $customer = Customer::query()
            ->create($data);
        return $customer->id;
    }
}