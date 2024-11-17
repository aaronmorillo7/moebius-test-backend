<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'phone',
        'phone_2',
        'postal_code',
        'birth_date',
        'gender',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'password',
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = Str::uuid();
        });
    }
}
