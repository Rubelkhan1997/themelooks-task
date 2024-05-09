<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;
use PhpParser\Node\Expr\Cast\Double;

class CartController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $variant = ProductVariant::with('product')->findOrFail($id);
        $price   = !empty($variant->discount)? $variant->selling_price - $variant->discount : $variant->selling_price;
        $title   = null;
        if($variant->size){
            $title = $variant->size;
        }
        if($variant->size && $variant->color){
            $title .= '-';
        }
        if($variant->color){
            $title .= $variant->color;
        }
        $name =  @$variant->product->name.($title? ' ('.$title.')': null); 
        // Cart 
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            // Increment quantity
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id"       => $id,
                "name"     => $name,
                "price"    => $price,
                "total"    => $price,
                "quantity" => 1,
                "discount" => $variant->discount,
                "image"    => $variant->image,
                "tax"      => @$variant->product->tax,
            ];
        }
        session()->put('cart', $cart);

        return $this->view();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function view()
    {
        $cart_items = session()->get('cart');
        return view('cart.cart', compact('cart_items'));
    }
    public function update(Request $request)
    {
        if( $request->id && $request->quantity){
            $variant = ProductVariant::with('product')->findOrFail($request->id);
            $id = $variant->id;
            // Get cart data 
            $cart = session()->get('cart');
            $cart[$id]["quantity"] = $request->quantity;
            // Update cart 
            session()->put('cart', $cart);
        }
        return ['success' => 'Cart updated successfully'];
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
        return ['success' => 'Product removed successfully'];
    }
}

