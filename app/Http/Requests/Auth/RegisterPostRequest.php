<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'min:2',
                'max:100',
                'persian_alpha'
            ],
            'last_name' => [
                'required',
                'min:2',
                'max:100',
                'persian_alpha'
            ],
            'email' => [
                'required',
                'max:150',
                'email',
                'unique:App\Models\User'
            ], 'password' => [
                'required',
                'min:6',
                'confirmed'
            ], 'mobile' => [
                'required',
                'unique:App\Models\User,mobile',
                'ir_mobile:zero'
            ],
        ];
    }
}
