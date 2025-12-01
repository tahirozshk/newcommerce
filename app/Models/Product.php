<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'description',
        'features',
        'price',
        'original_price',
        'stock',
        'rating',
        'reviews_count',
        'badge',
        'discount',
        'images',
        'is_featured',
        'is_hot_deal',
        'is_new_arrival',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'features' => 'array',
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_hot_deal' => 'boolean',
        'is_new_arrival' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * Accessor for a primary image URL.
     */
    protected function primaryImage(): Attribute
    {
        return Attribute::get(function () {
            $images = $this->images ?? [];

            if (is_array($images) && count($images) > 0) {
                return $images[0];
            }

            return 'https://via.placeholder.com/800x800?text=Product';
        });
    }
}


