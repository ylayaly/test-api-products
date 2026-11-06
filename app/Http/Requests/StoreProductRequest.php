<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

use App\Models\Currency;

class StoreProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'currency'=> 'required|string|exists:currencies,name',
            'currency_id' => 'required|integer|exists:currencies,id',
            'tax_cost' => 'numeric|min:0', 
            'manufacturing_cost' => 'numeric|min:0'
        ];
    }


    protected function prepareForValidation(): void
    {
        if ($this->has('currency')) {
            $this->merge([
                'currency' => strtoupper($this->get('currency')),
            ]);


            $currency = Currency::where('name', $this->currency)->first();
            
            if ($currency) {
                $this->merge([
                    'currency_id' => $currency->id,
                ]);
            }
        }
    }
}
