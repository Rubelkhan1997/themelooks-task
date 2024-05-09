<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $startDate = null;
        $endDate = null;
        if ($request->has('date_filter')) {
            $dates = explode(' - ', $request->get('date_filter'));
            $startDate = date('Y-m-d', strtotime($dates[0]));
            $endDate = date('Y-m-d', strtotime($dates[1]));
        }
       $query = Order::query();
        if ($startDate && $endDate) {
            $query->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
        }else{
            $query->whereDate('created_at', date('Y-m-d'));
        }
        $orders = $query->orderBy('id', 'DESC')->paginate(30); 

        return view('order.index', compact('orders'));
    }
    public function placeOrder()
    {
        $order_no  = Order::count() + 1; 
        // Calculate total values based on cart items
        $cart_items = session()->get('cart');
        $total_quantity = 0;
        $total_sub_amount = 0;
        $total_discount = 0;
        $total_tax = 0;
        // $total_amount = 0;
        foreach ($cart_items as $item) {
            $total_quantity += $item['quantity'];
            $total_sub_amount += $item['price'] * $item['quantity'];
            $total_discount += $item['discount'] * $item['quantity'];
            $total_tax += $item['tax'] * $item['quantity'];
        }
        // Create  
        $order = new Order;
        $order->order_number = $order_no;
        $order->total_quantity = $total_quantity;
        $order->total_sub_amount = $total_sub_amount;
        $order->total_discount = $total_discount;
        $order->total_tax = $total_tax;
        $order->total_amount = ($total_sub_amount - $total_discount) +  $total_tax;
        $order->save();
        // Save order product detail
        foreach ($cart_items as $item) {
            $sub_amount = $item['price'] * $item['quantity'];
            $discount   = $item['discount'] * $item['quantity'];
            $tax        = $item['tax'] * $item['quantity'];
            $total_amount = ($sub_amount - $discount) + $tax;
            // Order product
            $orderProduct = new OrderProduct;
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $item['id']; 
            $orderProduct->product_name = $item['name'];
            $orderProduct->quantity = $item['quantity'];
            $orderProduct->price = $item['price'];
            $orderProduct->discount = $item['discount'];
            $orderProduct->tax = $item['tax'];
            $orderProduct->total = $total_amount;
            $orderProduct->save();
        }
        session()->flush();

        return ['message' => 'Place Order'];
    }
}
