<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReminderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->id === $this->route('pet')->user_id;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:vaccination,medication,custom'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'recurring' => ['boolean'],
        ];
    }
}
