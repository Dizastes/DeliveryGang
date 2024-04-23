<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DeliveryGang</title>
</head>
	<body>
		<div class="header">

		</div> <!-- блок для header -->
		<div class="adv"></div> <!-- блок для рекламы -->
		<div class="main_block"> <!-- основной блок с товарами -->
		@foreach ($foods as $category => $foodItems)
		<div class="category">
			<h1>{{ $category }}</h1>
			@foreach ($foodItems as $food)
				<div class="item">
					<form action="/cart/add" method = "post">
						@csrf
						<input type="hidden" name = 'id' value = "{{$food->id}}">
						<p>{{$food->name}}</p>
						<p>{{$food->ingridients}}</p>
						<p>{{$food->cost}}</p>
						<button type = 'submit'>O</button>
					</form>

				</div>
			@endforeach
		</div>
		@endforeach
		</div>
		<div class="footer"></div> <!-- блок для footer -->
	</body>
</html>