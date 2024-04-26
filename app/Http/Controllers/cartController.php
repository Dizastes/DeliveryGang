<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Events\OrderAccepted;
use App\Http\Requests\newOrderRequest;


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

    public function addIntoCart(Request $request)
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

        return redirect()->route('cart.show');
    }


    public function showCart()
    {
        $cart = Session::get('cart', []);
        $totalCost = 0;
        $foods = [];
        $user['role'] = 0;
        foreach ($cart as $food) {
            $f = DB::table('food')->where('id', $food['id'])->get();
            $foodTemp['id'] = $f[0]->id;
            $foodTemp['quantity'] = $food['quantity'];
            $foodTemp['cost'] = $f[0]->cost;
            $foodTemp['name'] = $f[0]->name;
            $foodTemp['photo'] = $f[0]->photo;
            $temp = '';
            $foodIngridients = DB::table('food_ingridient')->select('ingridient_id')->where('food_id', $f[0]->id)->get();
            foreach ($foodIngridients as $ingridient) {
                if ($temp != '')
                    $temp .= ', ' . DB::table('ingridient')->select('name')->where('id', $ingridient->ingridient_id)->value('name');
                else
                    $temp .= DB::table('ingridient')->select('name')->where('id', $ingridient->ingridient_id)->value('name');
            }
            $foodTemp['ingridients'] = $temp;
            array_push($foods, $foodTemp);
            $totalCost += intval($f[0]->cost) * $food['quantity'];
        }


        return view('cart', ['foods' => $foods, 'totalCost' => $totalCost, 'cart' => $cart, 'user' => $user]);
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

    public function addOrder(newOrderRequest $request)
    {
        $order = new Orders();

        $token = explode(".", Cookie::get('Auth'));
        $data = json_decode(base64_decode($token[1]), true);

        $order->status = 'Ожидает модерации';
        $order->user_id = $data['id'];

        $street = $request->input('street');
        $houseNum = $request->input('houseNum');
        $entrance = $request->input('entrance');
        $apartment = $request->input('apartment');

        $order->address = 'ул.' . $street . ', д. ' . $houseNum .  ', под. ' . $entrance . ', кв. ' . $apartment;
        $order->time = $request->input('time');
        $order->cost = $request->input('cost');
        $order->comment = $request->input('comment');
        $order->save();

        $cart = Session::get('cart', []);

        if ($cart == []) {
            return response()->json(['error' => 'залогинься']);
        }

        foreach ($cart as $food) {
            for ($i = 0; $i < $food['quantity']; $i += 1) {
                DB::table('order_list')->insert([
                    'order_id' => $order->id,
                    'food_id' => $food['id']
                ]);
            }
        }

        Session::forget('cart');

        event(new OrderAccepted($order));
        return redirect()->route('home');
    }
}
