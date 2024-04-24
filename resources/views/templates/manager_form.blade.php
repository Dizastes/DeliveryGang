<script>
	let status;
	let select
</script>
@foreach ($items as $order)
	<form action="orders/change" id="form{{$order->id}}" method="post">
		@csrf
		<input type="hidden" value="{{$order->id}}" name="id">
		<p>{{$order->time}}</p>
		<p>{{$order->address}}</p>
		<p>{{$order->cost}}</p>
		<select name="status" id="test{{$order->id}}">
			<option value="ожидает модерации">ожидает модерации</option>
			<option value="в очереди">в очереди</option>
			<option value="готовится">готовится</option>
			<option value="ждет курьера">ждет курьера</option>
			<option value="в доставке">в доставке</option>
			<option value="получен">получен</option>
			<option value="отклонен">отклонен</option>
		</select>
	</form>
	<script>
		document.querySelector("#test{{$order->id}}").addEventListener('change', function (e) {
		  document.querySelector('#form{{$order->id}}').submit();
		})

		status = "{{$order->status}}";
		select = document.querySelector('#test{{$order->id}}');

		for (let i = 0; i < select.childNodes.length; i++) {
		    if (select.childNodes[i].value == status) {
		      select.childNodes[i].selected = true;
		      break;
		    }        
		}
	</script>
@endforeach