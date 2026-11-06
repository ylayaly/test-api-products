<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Database\Factories\ProductFactory;

#[Fillable(['name', 'description', 'price', 'currency_id', 'tax_cost', 'manufacturing_cost'])] 

class Product extends Model
{

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    public const PAGINATE = 100;


    /**
     * Get the currency that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get all of the productPrices for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPrices(): HasMany
    {
        return $this->hasMany(ProductPrices::class);
    }

}
