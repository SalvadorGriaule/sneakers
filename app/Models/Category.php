<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ["name","category_id"];

    public function subcategoryP(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function subcategoryC(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function listProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,"categories_products");
    }
}
