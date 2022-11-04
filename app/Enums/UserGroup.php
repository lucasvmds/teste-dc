<?php

declare(strict_types=1);

namespace App\Enums;

enum UserGroup: string
{
    case ADMIN = 'admin';
    case SELLER = 'seller';
}