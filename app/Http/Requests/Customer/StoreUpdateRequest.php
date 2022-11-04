<?php

declare(strict_types=1);

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'cpf' => 'required|numeric',
            'phone' => 'required|numeric',
            'street' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ];
    }
}
