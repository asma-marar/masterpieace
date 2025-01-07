<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        $rules = [
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required|string|max:200',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:0',
            'color' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:50',
        ];
        
        return $rules;
    }
}
