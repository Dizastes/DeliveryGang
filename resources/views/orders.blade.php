<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DeliveryGang</title>
</head>
<body>
	<h1>Главная</h1>
	<div class="header"></div> <!-- блок для header -->
	<div class="adv"></div> <!-- блок для рекламы -->
	<div class="main_block"> <!-- основной блок с товарами -->
		<div class="item">
            @foreach ($items as $item)
                <div class="item">{{ $item->status}} человек под {{ $item->id }} будет через {{ $item->time }}</div>
            @endforeach
		</div>
	</div>
	<div class="footer"></div> <!-- блок для footer -->
	@foreach ($items as $order)
		<form action="" id="form" method="post">
			@csrf
			<input type="hidden" value="{{$order->id}}" name="id">
			<p>{{$order->time}}</p>
			<p>{{$order->address}}</p>
			<p>{{$order->cost}}</p>
			<select name="status" id="test">
				<option value="{{$order->status}}">{{$order->status}}</option>
				<option value="в доставке">в доставке</option>
				<option value="хуй">хуй</option>
			</select>
			<!-- <input type="text" value="123" name="status">
			<input type="submit"> -->
		</form>
	@endforeach
	<script>
		document.querySelector("#test").addEventListener('change', function (e) {
		  document.querySelector('#form').submit();
		})
	</script>
</body>
</html>