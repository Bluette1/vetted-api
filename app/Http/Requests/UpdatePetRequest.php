<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->id === $this->route('pet')->user_id;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'species' => ['sometimes', 'in:cat,dog'],
            'breed' => ['nullable', 'string', 'max:255'],
            'dob' => ['nullable', 'date'],
            'weight' => ['nullable', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
