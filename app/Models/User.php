<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'uid',
        'first_name',
        'last_name',
        'email',
        'password',
        'adress',
        'phone',
        'phone_2',
        'postal_code',
        'birth_date',
        'gender',
    ];

    protected $hidden = [
        'password',
    ];
}
