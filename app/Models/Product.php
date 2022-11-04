<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NumberFormatter;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
    ];

    public function getFormattedPrice(): string
    {
        $formatter = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);
        return $formatter->formatCurrency((float) $this->price, 'BRL');
    }
}
