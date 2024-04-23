<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Http\Response;
class StatusController extends Controller
{
    public function getOdersData(Request $request)
    {
        $orders = null;
        $token = explode(".", $request->cookie('Auth'));
    	$data = json_decode(base64_decode($token[1]), true);
        // return response()->json($data);
        switch($data['role']) {
            case 1:
                $orders = Orders::whereIn('status',['ожидает курьера','в доставке'])->get();
                break;
            case 2:
                $orders = Orders::whereIn('status',['ожидает курьера','готовится', 'в очереди'])->get();
                break;
            case 3:
                $orders = Orders::all();
                break;
            default:
                return response()->json(['status' => Response::HTTP_FORBIDDEN]);
        }
        return view('orders', ['items' => $orders,]);
    }

    public function changeStatus(Request $request) {
    	$order_id = $request->only('id');
    	$status = $request->only('status');
    	$order = Orders::updateOrCreate(['id' => $order_id], ['status' => $status['status']]);
    	return redirect('/orders');
    }

    public function setNextStatus(Request $request) {
    	
    }
}
