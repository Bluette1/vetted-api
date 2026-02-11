<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWellnessEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->id === $this->route('pet')->user_id;
    }

    public function rules(): array
    {
        return [
            'date' => ['required', 'date'], // We will handle uniqueness check in controller or DB
            'appetite' => ['nullable', 'integer', 'min:1', 'max:5'],
            'energy' => ['nullable', 'integer', 'min:1', 'max:5'],
            'mood' => ['nullable', 'integer', 'min:1', 'max:5'],
            'bathroom' => ['nullable', 'integer', 'min:1', 'max:5'],
            'activity' => ['nullable', 'integer', 'min:1', 'max:5'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
