<?php

declare(strict_types=1);

namespace App\Http\Requests\Individual;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndividualRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:individuals|max:255',
            'full_name' => 'required|max:255',
            'phone_number' => 'required|regex:/^\\+?[1-9][0-9]{7,14}$/',
        ];
    }
}
