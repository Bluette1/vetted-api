<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHealthRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->id === $this->route('health_record')->pet->user_id;
    }

    public function rules(): array
    {
        return [
            'type' => ['sometimes', 'in:vaccination,medication,vet_visit,note'],
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date' => ['sometimes', 'date'],
            'document' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:10240'],
        ];
    }
}
