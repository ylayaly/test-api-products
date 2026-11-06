<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

use App\Models\Currency;

class UpdateProductRequest extends FormRequest
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
            'name' => 'sometimes|filled|string|max:255',
            'description' => 'sometimes|filled|string|max:255',
            'price' => 'sometimes|filled|numeric|min:0',
            'currency'=> 'sometimes|filled|string|exists:currencies,name',
            'currency_id' => 'sometimes|filled|integer|exists:currencies,id',
            'tax_cost' => 'sometimes|nullable|numeric|min:0', 
            'manufacturing_cost' => 'sometimes|nullable|numeric|min:0'
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
        
        return $validated;
    }
}
