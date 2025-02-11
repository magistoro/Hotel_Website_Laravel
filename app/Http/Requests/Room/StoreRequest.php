<?php

namespace App\Http\Requests\Room;

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
            'price_per_night'  => 'required|numeric',
            'people_count' => 'required|numeric',
            
            'image' => 'nullable|image',

            'category_id' => 'nullable|int',
            'status_id' => 'nullable|int',

            'amenities' => 'nullable|array',
        ];
    }
}
