<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class GoogleStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string',
            'birthdate' => 'required|date',
            'email' => 'required|email',
            'password' => 'required|string',
            'role_id' => 'required|integer',
            'google_id' => 'required|string',
        ];
    }
}
