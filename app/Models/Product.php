<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        "name","description","price","image","quantité","seller"
    ];

    public function listCategory(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,"categories_products");
    }
}
