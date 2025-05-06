<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductClassifications extends Model
{
    use HasFactory;

    protected $table = 'product_classifications';

    protected $fillable = [
        'name',
    ];

    public function products(){
        return $this->hasMany(Products::class, 'classification_id');
    }
}
