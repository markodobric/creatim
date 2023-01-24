<?php

declare(strict_types=1);

namespace App\Http\Requests\LegalEntity;

use Illuminate\Foundation\Http\FormRequest;

class StoreLegalEntityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tax_number' => 'required|unique:legal_entities|max:50',
        ];
    }
}
