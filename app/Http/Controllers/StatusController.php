<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\CourierOrders;
use Illuminate\Http\Response;
use App\Events\OrderAccepted;
use App\Models\Food;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class StatusController extends Controller
{
	public function getOdersData(Request $request)
	{
		$orders = [];
		$orderDB = [];
		$form_name = '';
		$token = explode(".", $request->cookie('Auth'));
		$data = json_decode(base64_decode($token[1]), true);
		// return response()->json($data);
		switch ($data['role']) {
			case 1:
				$orders_id = CourierOrders::where('user_id', $data['id'])->get();
				$id_array = [];

				foreach ($orders_id as $row) {
					$id_array[] = $row['order_id'];
				}

				$orderDB = Orders::whereIn('status', ['ждет курьера'])->OrwhereIn('id', $id_array)->get();
				$form_name = 'other';
				break;
			case 2:
				$orderDB = Orders::whereIn('status', ['готовится', 'в очереди'])->get();
				$form_name = 'other';
				break;
			case 3:
				$orderDB = Orders::all();
				$form_name = 'manager';
				break;
			default:
				return response()->json(['status' => Response::HTTP_FORBIDDEN]);
		}
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
			$orderTemp['address'] = $temp->address;
			$orderTemp['time'] = $temp->time;
			$orderTemp['number'] = User::select('number')->where('id', $temp->user_id)->value('number');
			$orderTemp['status'] = $temp->status;
			$orderTemp['comment'] = $temp->comment;
			array_push($orders, $orderTemp);
		}
		$orders = array_reverse($orders);
		return view('orders', ['items' => $orders, 'form_name' => $form_name, 'role' => $data['role']]);
	}

	public function changeStatus(Request $request)
	{
		$order_id = $request->only('id');
		$status = $request->only('status');
		$order = Orders::updateOrCreate(['id' => $order_id], ['status' => $status['status']]);

		$courier_orders = CourierOrders::where("order_id", $order_id['id'])->delete();

		event(new OrderAccepted($order));
		return redirect('/orders');
	}

	public function setNextStatus(Request $request)
	{
		$token = explode(".", $request->cookie('Auth'));
		$data = json_decode(base64_decode($token[1]), true);

		$order_id = $request->only('id');
		$status = $request->only('status_button')['status_button'];

		if ($data['role'] == 1) {
			if ($status == 'ждет курьера') {
				$order = "123";
				CourierOrders::create(['order_id' => $order_id['id'], 'user_id' => $data['id']]);
			} else {
				CourierOrders::where('order_id', $order_id['id'])->where('user_id', $data['id'])->delete();
			}
		}

		$status_list = ['ожидает модерации', 'в очереди', 'готовится', 'ждет курьера', 'в доставке', 'получен'];

		$index = array_search($status, $status_list);
		if ($index == count($status_list) - 1) {
			event(new OrderAccepted($order));
			return redirect('orders');
		} else {
			$status = $status_list[$index + 1];
			$order = Orders::updateOrCreate(['id' => $order_id], ['status' => $status]);
			event(new OrderAccepted($order));
			return redirect('/orders');
		}
	}
}
