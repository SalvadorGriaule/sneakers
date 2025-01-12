<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Categories_products extends Model
{
    protected $fillable = ["category_id", "product_id"];

    public $timestamps = false;

    protected function scopeIfExists(Builder $query, int $idProd, int $idCatg): void
    {
        $query->where("product_id", $idProd)->where("category_id", $idCatg);
    }
}
