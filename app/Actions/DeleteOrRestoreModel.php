<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;

class DeleteOrRestoreModel
{
    public static function run(Model $model): void
    {
        if ($model->trashed()) {
            $model->restore();
        } else {
            $model->delete();
        }
    }
}