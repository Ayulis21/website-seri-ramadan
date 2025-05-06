<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrocierPrices extends Model
{
    use HasFactory;

    protected $table = 'grocier_prices';

    protected $fillable = [
        'product_id',
        'qty',
        'price'
    ];

    public function product(){
        
    }
}
