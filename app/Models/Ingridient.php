<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingridient extends Model
{
    use HasFactory;

    protected $table = "ingridient";

    protected $fillable = [
    	'id',
        'name',
    ];
}
