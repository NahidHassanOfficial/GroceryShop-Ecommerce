<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequests extends FormRequest
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
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'weight' => 'required|numeric',
            'size' => 'nullable|array',
            'colors' => 'nullable|array',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'tag' => 'nullable|in:Hot,Sale',
            'stock' => 'required|integer',
            'status' => 'boolean',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
        ];

        if ($this->route()->getName() === 'dash.product.edit') {
            $id = $this->route(param: 'id');

            $rules['id'] = 'numeric|exist:products,id';
            $rules['image'] = 'array|max:5';
            $rules['image.*'] = 'image|max:2048';
            $rules['product_code'] = 'required|string|unique:products,product_code,' . $id . ',id';
            $rules['product_sku'] = 'required|string|unique:products,product_sku,' . $id;
            $rules['slug'] = 'required|unique:products,slug,' . $id;

        } else if ($this->route()->getName() === 'dash.product.add') {
            $rules['image'] = 'array|min:1|max:5';
            $rules['image.*'] = 'required|filled|image|max:2048';
            $rules['product_code'] = 'required|string|unique:products,product_code';
            $rules['product_sku'] = 'required|string|unique:products,product_sku';
            $rules['slug'] = 'required|unique:products,slug';
        }

        return $rules;
    }
}
