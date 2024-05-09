<?php
namespace App\Services;

use App\Models\ProductVariant; 
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductService{

    public function store($product, array $data)
    {
        foreach ($data['variants'] as $various) {
            $file_name = Str::slug($various['image']->getClientOriginalName()).time().'.'.$various['image']->extension();  
            $path_name = 'uploads/products/'.Carbon::now()->format('Y/m');
            $various['image']->move(public_path($path_name), $file_name);
            // Store variant 
            $variant                 = new ProductVariant();
            $variant->product_id     = $product->id;  
            $variant->size           = $various['size'];  
            $variant->color          = $various['color'];  
            $variant->selling_price  = $various['selling_price'];  
            $variant->purchase_price = $various['purchase_price'];  
            $variant->discount       = $various['discount'] ?? 0;
            $variant->image          = $path_name.'/'.$file_name;
            $variant->save();
        }

        return true;
    } 
}