<?php

declare(strict_types=1);

namespace App\Http\Requests\LegalEntity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLegalEntityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tax_number' => [
                'required',
                'max:50',
                Rule::unique('legal_entities')->ignore($this->request->get('id')),
            ],
        ];
    }
}
