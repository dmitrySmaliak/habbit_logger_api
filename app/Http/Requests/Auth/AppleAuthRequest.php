<?php

namespace App\Http\Requests\Auth;

use App\Enums\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppleAuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, \Illuminate\Contracts\Validation\ValidationRule|string>>
     */
    public function rules(): array
    {
        return [
            'token' => ['required', 'string'],
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'gender' => ['nullable', Rule::enum(GenderEnum::class)],
            'birth_date' => ['nullable', 'date', 'before_or_equal:today'],
            'hobby' => ['nullable', 'string', 'max:255'],
        ];
    }
}
