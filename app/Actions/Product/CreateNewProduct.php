<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Models\Product;

class CreateNewProduct
{
    public static function run(array $data): int
    {
        $product = Product::query()
            ->create($data);
        return $product->id;
    }
}