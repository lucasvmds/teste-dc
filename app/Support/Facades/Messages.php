<?php

declare(strict_types=1);

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @package 
 * @method static \App\Support\Messages danger(string $content)
 * @method static \App\Support\Messages warning(string $content)
 * @method static \App\Support\Messages success(string $content)
 */
class Messages extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Support\Messages::class;
    }
}