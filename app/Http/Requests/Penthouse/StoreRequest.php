<?php

namespace App\Http\Requests\Penthouse;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title'  => 'required|string',
            'description'  => 'nullable|string',
            'price'  => 'required|numeric',
            
            'image' => 'nullable|image',

            'category_id' => 'nullable|int',
            'user_id' => 'nullable|string',

            'amenities' => 'nullable|array',
        ];
    }
}
