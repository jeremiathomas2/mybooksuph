<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_type',
        'customer_id',
        'total_amount',
        'payment_method',
        'status',
        'delivery_region',
        'address_notes',
    ];

    public function customer()
    {
        return $this->morphTo(null, 'customer_type', 'customer_id');
    }
}
