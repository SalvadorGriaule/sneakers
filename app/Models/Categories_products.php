<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories_products extends Model
{
    protected $fillable = ["category_id","product_id"];

    public $timestamps = false;
}
