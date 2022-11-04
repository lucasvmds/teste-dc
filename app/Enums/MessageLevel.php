<?php

declare(strict_types=1);

namespace App\Enums;

enum MessageLevel: string
{
    case DANGER = 'danger';
    case WARNING = 'warning';
    case SUCCESS = 'success';
}