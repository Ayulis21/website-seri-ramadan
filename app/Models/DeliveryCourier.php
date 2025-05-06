<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryCourier extends Model
{
    use HasFactory;

    protected $table = 'delivery_couriers';

    protected $fillable = [
        'shipper_id',
        'name',
        'address',
        'email',
        'phone'
    ];

    public function shipper(){
        return $this->belongsTo(Shippers::class, 'shipper_id');
    }

    public function order(){
        return $this->hasMany(Orders::class, 'courier_id');
    }
}
