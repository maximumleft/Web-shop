<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'second_image' => 'required|file',
            'old_price' => 'required|integer',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'is_published' => 'nullable|string',
            'category_id' => 'required|integer',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
