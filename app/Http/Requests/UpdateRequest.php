<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'max:255',
            'nickname' => 'max:255',
            'telephone' => '',
            'email' => '',
            // 'email' => ['email', Rule::unique('users')->ignore($this->route()->parameter('user'))],
            'ville' => 'string',
            'commune' => 'string'
        ];
    }
}
