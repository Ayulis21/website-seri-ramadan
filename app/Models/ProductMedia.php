<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMedia extends Model
{
    use HasFactory;

    protected $table = 'product_media';
    public $timestamps = false;

    protected $fillable = [
        'url',
        'product_id'
    ];

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
}
