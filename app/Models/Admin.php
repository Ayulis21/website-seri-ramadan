<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'qty',
        'username',
        'password',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($admin) {
            // Hash password sebelum disimpan
            if ($admin->password) {
                $admin->password = bcrypt($admin->password);
            }
        });
    }
}
