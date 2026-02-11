<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHealthRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->id === $this->route('pet')->user_id;
    }

    public function rules(): array
    {
        return [
            'type' => ['required', 'in:vaccination,medication,vet_visit,note'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'document' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:10240'], // 10MB max
        ];
    }
}
