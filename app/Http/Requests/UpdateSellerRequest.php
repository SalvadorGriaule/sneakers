<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categories_products;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    protected function prepareForValidation(): void
    {
        $this->merge([
            'categorie' => json_decode($this->categorie)
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'image',
            'quantité' => 'required|numeric|min:0',
            'categorie' => 'array',
            'categorie.*' => 'numeric|exists:categories,id'
        ];
    }

    
}
