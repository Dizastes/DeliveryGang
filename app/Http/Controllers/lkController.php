<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Food;
use Illuminate\Support\Facades\DB;


class lkController extends Controller
{
    public function getInfo(Request $request)
    {
        $token = explode(".", $request->cookie('Auth'));
        $data = json_decode(base64_decode($token[1]), true);
        $id = $data['id'];
        $userInfo = User::where('id', $id)->get();
        $user['name'] = $userInfo[0]->name;
        $user['number'] = $userInfo[0]->number;
        $user['email'] = $userInfo[0]->email;
        $user['birth'] = $userInfo[0]->birth;
        $user['role'] = $userInfo[0]->privilege;

        $orderDB = Orders::where('user_id', $id)->get();
        $orders = [];
        foreach ($orderDB as $temp) {
            $orderTemp['id'] = $temp->id;
            $orderTemp['date'] = $temp->created_at;
            $orderTemp['foods'] = [];
            $food_list = DB::table('order_list')->select('food_id')->where('order_id', $temp->id)->get();
            $count = [];
            foreach ($food_list as $food) {
                if (isset($count[$food->food_id]))
                    $count[$food->food_id] += 1;
                else
                    $count[$food->food_id] = 1;
            }
            foreach ($count as $key => $cnt) {
                $sostav = Food::select('name')->where('id', $key)->value('name');
                $orderTemp['foods'][$key] = $sostav . ' x' . $cnt;
            }
            $orderTemp['cost'] = $temp->cost;
            $orderTemp['status'] = $temp->status;
            array_push($orders, $orderTemp);
        }
        return view('lk', ['orders' => $orders, 'user' => $user]);
    }
}
