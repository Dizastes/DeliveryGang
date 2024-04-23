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
				<p>{{ $item->name }}</p>
			@endforeach
		</div>
	</div>
	<div class="footer"></div> <!-- блок для footer -->
</body>
</html>