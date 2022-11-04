<?php

declare(strict_types=1);

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class AttemptRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|boolean',
        ];
    }
}
