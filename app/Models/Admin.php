<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User As Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

    protected $filable = [
        'name', 'email','password'
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
