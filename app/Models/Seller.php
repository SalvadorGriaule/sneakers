<?php

namespace App\Models;

use App\Models\Scopes\SellerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy(SellerScope::class)]
class Seller extends User
{
    /** @use HasFactory<\Database\Factories\SellerFactory> */
    use HasFactory;

    protected $attributes = [
        'role' => "seller"
    ];

    protected $table = "users";
}
