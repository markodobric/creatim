<?php

declare(strict_types=1);

namespace App\Http\Requests\Individual;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIndividualRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('individuals')->ignore($this->request->get('id')),
            ],
            'full_name' => 'required|max:255',
            'phone_number' => 'required|max:50',
        ];
    }
}
