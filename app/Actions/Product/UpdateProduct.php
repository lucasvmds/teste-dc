<?php

declare(strict_types=1);

namespace App\Actions\Product;

use App\Models\Product;

class UpdateProduct
{
    public static function run(array $data, Product $product): void
    {
        $product->update($data);
    }
}