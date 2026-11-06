<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Database\Factories\ProductFactory;

#[Fillable(['name', 'symbol', 'exchange_rate'])] 

class Currency extends Model
{    

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    /**
     * Get all of the product for the Currency
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    /**
     * Get all of the productPrices for the Currency
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productPrices(): HasMany
    {
        return $this->hasMany(ProductPrices::class);
    }
}
