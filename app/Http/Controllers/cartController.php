<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;

class cartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = [
            'id' => $request->input('id'),
            'quantity' => 1
        ];

        $cart = Session::get('cart', []);

        if (array_key_exists($product['id'], $cart)) {
            $cart[$product['id']]['quantity'] += 1;
        } else {
            $cart[$product['id']] = $product;
        }

        Session::put('cart', $cart);

        return redirect()->route('home');
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);

        return response()->json(compact('cart'));
    }

    public function clearCart()
    {
        Session::forget('cart');

        return redirect()->route('cart.show');
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('id');

        $cart = Session::get('cart', []);

        if (array_key_exists($productId, $cart)) {
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity'] -= 1;
            } else {
                unset($cart[$productId]);
            }

            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }

    public function addOrder(Request $request)
    {
        $order = new Orders();
        $order->user_id = 
        $order->save();
        dd($order->id);
    }
}