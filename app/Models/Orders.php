<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
    	'id',
        'status',
        'user_id',
        'address',
        'time',
        'cost'
    ];
}
