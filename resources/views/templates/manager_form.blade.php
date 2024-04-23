@foreach ($items as $order)
	<form action="orders/change" id="form" method="post">
		@csrf
		<input type="hidden" value="{{$order->id}}" name="id">
		<p>{{$order->time}}</p>
		<p>{{$order->address}}</p>
		<p>{{$order->cost}}</p>
		<select name="status" id="test">
			<option value="{{$order->status}}">{{$order->status}}</option>
			<option value="в доставке">в доставке</option>
		</select>
	</form>
@endforeach
<script>
	document.querySelector("#test").addEventListener('change', function (e) {
	  document.querySelector('#form').submit();
	})
</script>