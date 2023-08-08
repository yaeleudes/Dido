<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChampsRequest extends FormRequest
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
            'name' => ['string', 'required'],
            'nickname' => ['string', 'required'],
            'telephone' => ['required', 'numeric'],
            'email' => ['email', 'required', 'unique:users'],
            'ville' => ['string', 'required'],
            'commune' => ['string', 'required'],
            'description' => ['string'],
            'password' => ['required', 'min:8'],
            'avatar' => ['image', 'max:5000']
        ];
    }
}
