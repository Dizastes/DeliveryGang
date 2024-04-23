@foreach ($items as $order)
	<form action="orders/next" id="form" method="post">
		@csrf
		<input type="hidden" value="{{$order->id}}" name="id">
		<p>{{$order->time}}</p>
		<p>{{$order->address}}</p>
		<p>{{$order->cost}}</p>
		<input type="submit" value="{{$order->status}}" name="status_button">
	</form>
@endforeach
