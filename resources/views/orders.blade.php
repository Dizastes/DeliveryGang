<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DeliveryGang</title>
	<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<body>
	<h1>Главная</h1>
	<div class="header"></div> <!-- блок для header -->
	<div class="adv"></div> <!-- блок для рекламы -->
	<div class="main_block"> <!-- основной блок с товарами -->
		<!-- <div class="item">
            @foreach ($items as $item)
                <div class="item">{{ $item->status}} человек под {{ $item->id }} будет через {{ $item->time }}</div>
            @endforeach
		</div> -->
	</div>
	<div class="footer"></div> <!-- блок для footer -->
	@php
		$string = 'templates.' . $form_name . '_form';
	@endphp
	@include($string)
	<script>
		var pusher = new Pusher('e4af738018f4c430d7fb', {
		  cluster: 'eu'
		});

		var channel = pusher.subscribe('order-accepted-channel');
		channel.bind('App\\Events\\OrderAccepted', function(data) {
	  // Здесь вы можете обработать данные, переданные событием
		  // console.log('Received data:', data);
		  window.location.reload();
		});
	</script>
</body>
</html>