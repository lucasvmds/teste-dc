<?php

declare(strict_types=1);

namespace App\Actions\Customer;

use App\Models\Customer;

class UpdateCustomer
{
    public static function run(array $data, Customer $customer): void
    {
        $customer->update($data);
    }
}