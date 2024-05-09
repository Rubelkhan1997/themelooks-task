<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'unit',
        'unit_value',
        'tax',
        'created_by',
    ];
    
    // Relation
    function variants(){
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
}
