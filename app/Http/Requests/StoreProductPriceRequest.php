<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Currency;

class StoreProductPriceRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'currency'=> 'required|string|exists:currencies,name',
            'product_id' => 'required|integer|exists:products,id',
            'currency_id' => [
                'required',
                'integer',
                'exists:currencies,id',
                Rule::unique('product_prices', 'currency_id')
                    ->where('product_id', $this->route('product')),
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'product_id' => $this->route('product'),
        ]);
 

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

    public function validated($key = null, $default = null): array
    {
        $validated = parent::validated($key, $default);
        
        if (isset($validated['currency'])) {
            $currency = Currency::where('name', $validated['currency'])->first();
            if ($currency) {
                $validated['currency_id'] = $currency->id;
            }
        }
        
        unset($validated['currency']);
        $validated["product_id"] = $this->route('product');
        
        return $validated;
    }

}
