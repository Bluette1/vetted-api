<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReminderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->id === $this->route('reminder')->pet->user_id;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'type' => ['sometimes', 'in:vaccination,medication,custom'],
            'date' => ['sometimes', 'date'],
            'time' => ['sometimes', 'date_format:H:i', 'string'],
            'recurring' => ['boolean'],
            'completed' => ['boolean'],
            'snoozed' => ['boolean'],
        ];
    }
}
