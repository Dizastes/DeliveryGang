<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DeliveryGang</title>
</head>
<body>
	<h1>Главная</h1>
	@foreach ($items as $item)
		<p>{{ $item->name }}</p>
	@endforeach
</body>
</html>