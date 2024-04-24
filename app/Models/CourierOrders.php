<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierOrders extends Model
{
    use HasFactory;

    protected $table = "courier_orders";

    protected $fillable = [
    	'id',
        'order_id',
        'user_id',
    ];
}
