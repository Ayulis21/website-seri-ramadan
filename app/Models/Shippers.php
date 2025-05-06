<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shippers extends Model
{
    use HasFactory;

    protected $table = 'shippers';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
    ];

    public function couriers(){
        return $this->hasMany(DeliveryCourier::class, 'shipper_id');
    }
    public function order(){
        return $this->hasMany(Orders::class, 'shipper_id');
    }

}
