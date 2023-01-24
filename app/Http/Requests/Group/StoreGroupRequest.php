<?php

declare(strict_types=1);

namespace App\Http\Requests\Group;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'individuals' => 'required|array',
            'individuals.*' => 'exists:individuals,id',
        ];
    }
}
