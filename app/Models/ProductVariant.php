<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'selling_price',
        'purchase_price',
        'discount',
        'tax',
    ];
    // Relation
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->selectRaw('id, name, sku, unit, unit_value, tax');
    }
}
