<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\CourierOrders;
use Illuminate\Http\Response;
use App\Events\OrderAccepted;
class StatusController extends Controller
{
    public function getOdersData(Request $request)
    {
        $orders = null;
        $form_name = '';
        $token = explode(".", $request->cookie('Auth'));
    	$data = json_decode(base64_decode($token[1]), true);
        // return response()->json($data);
        switch($data['role']) {
            case 1:
            	$orders_id = CourierOrders::where('user_id', $data['id'])->get();
            	$id_array = [];

            	foreach ($orders_id as $row) {
            		$id_array[] = $row['order_id'];
            	}

                $orders = Orders::whereIn('status',['ждет курьера'])->OrwhereIn('id', $id_array)->get();
                $form_name = 'other';
                break;
            case 2:
                $orders = Orders::whereIn('status',['готовится', 'в очереди'])->get();
                $form_name = 'other';
                break;
            case 3:
                $orders = Orders::all();
                $form_name = 'manager';
                break;
            default:
                return response()->json(['status' => Response::HTTP_FORBIDDEN]);
        }
        return view('orders', ['items' => $orders, 'form_name' => $form_name,]);
    }

    public function changeStatus(Request $request) {
    	$order_id = $request->only('id');
    	$status = $request->only('status');
    	$order = Orders::updateOrCreate(['id' => $order_id], ['status' => $status['status']]);
    	return redirect('/orders');
    }

    public function setNextStatus(Request $request) {
    	$token = explode(".", $request->cookie('Auth'));
    	$data = json_decode(base64_decode($token[1]), true);

    	$order_id = $request->only('id');
    	$status = $request->only('status_button')['status_button'];
    	
    	if ($data['role'] == 1) {
    		if ($status == 'ждет курьера') {
    			$order = "123";
    			CourierOrders::create(['order_id' => $order_id['id'], 'user_id' => $data['id']]);
    			event(new OrderAccepted($order));
    		}
    		else {
    			CourierOrders::where('order_id', $order_id['id'])->where('user_id', $data['id'])->delete();
    		}
    	}

    	$status_list = ['ожидает модерации', 'в очереди', 'готовится', 'ждет курьера', 'в доставке', 'получен'];

    	$index = array_search($status, $status_list);
    	if ($index == count($status_list) - 1 ) {
    		return redirect('orders');
    	}
    	else {
    		$status = $status_list[$index + 1];
    		$order = Orders::updateOrCreate(['id' => $order_id], ['status' => $status]);
    		return redirect('/orders');
    	}
    }
}







