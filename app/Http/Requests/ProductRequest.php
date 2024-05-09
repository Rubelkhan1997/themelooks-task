<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductRequest extends FormRequest
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
            'id'   => 'nullable|numeric|exists:products,id',
            'name' => 'required|string|max:255',
            'sku'  => 'required|string|unique:products,sku',
            'unit' => 'required|in:kg,liter,pieces',
            'unit_value' => 'required|numeric',
            'tax'  => 'required|numeric',
            'variants' => 'required|array',
            'variants.*.size' => 'nullable|string|max:100',
            'variants.*.color' => 'required|string|max:100',
            'variants.*.purchase_price' => 'required|numeric|min:0',
            'variants.*.selling_price' => 'required|numeric|min:0',
            'variants.*.discount' => 'nullable|numeric|min:0',
            'variants.*.image' => 'required|image|max:2048',
            
        ];
    }
    public function messages(): array
    {
        return [
            'variants.required'  => 'Add variants',
        ];
    }
}
