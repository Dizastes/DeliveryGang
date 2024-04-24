<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<title>DeliveryGang</title>
</head>
	<body>
		<header></header>
		<main>
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
							<!-- Нужна будет картинка -->
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
		</main>
		@include('templates.footer')
	</body>
</html>