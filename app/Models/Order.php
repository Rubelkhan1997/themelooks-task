<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'total_quantity',
        'total_sub_amount',
        'total_discount',
        'total_tax',
        'total_amount',
    ];
}
