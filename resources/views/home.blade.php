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
	<header>
		<form action="/NewFood" method = 'post'>
			@csrf
		<button type = 'submit'>+</button>
		</form>
	</header>
	<main>
		<div class="adv"></div> <!-- блок для рекламы -->
		<div class="main_block"> <!-- основной блок с товарами -->

			@if($role == 3 and isset($modal))
			<div class="modal13213">
				<form action="addNewFood" method='post'>
					@csrf
					<p>Название: </p>
					<input type="text" name='name'>
					<p>Категория: </p>
					<input type="text" name='category'>
					<p>Состав: </p>
					@foreach($ingridients as $ingridient)
						<p>{{$ingridient[0]->name}}</p>
					@endforeach
					<p></p>
					<p>Цена: </p>
					<input type="text" name='cost'>
					<button type='submit'>Добавить</button>
				</form>
				<form action="addNewIngridient" method='post'>
					@csrf
					<select class="form-select" aria-label="Default select example" name='ingridient_id'>
						@foreach($newIngridients as $ingridient)
						<option value="{{$ingridient->id}}">{{$ingridient->name}}</option>
						@endforeach
					</select>
					<button type='submit'>+</button>
				</form>
				<form action="deleteNewIngridient" method='post'>
					@csrf
					<select class="form-select" aria-label="Default select example" name='ingridient_id'>
						@foreach($ingridients as $ingridient)
						<option value="{{$ingridient[0]->id}}">{{$ingridient[0]->name}}</option>
						@endforeach
					</select>
					<button type='submit'>-</button>
				</form>
			</div>
			@endif
			@foreach ($foods as $category => $foodItems)
			<div class="category">
				<h1>{{ $category }}</h1>
				@foreach ($foodItems as $food)
				<div class="item">
					<form action="@if ($role == 3) {{ '/' }} @else {{ '/cart/add' }} @endif" method="@if ($role==3) {{'get'}} @else {{'post'}} @endif">
						@if (!$role==3)
						@csrf
						@endif
						<input type="hidden" name='id' value="{{$food->id}}">
						<!-- Нужна будет картинка -->
						<p>{{$food->name}}</p>
						<p>{{$food->ingridients}}</p>
						<p>{{$food->cost}}</p>
						@if($role == 3)
						<button type='submit'>Изменить</button>
						@else
						<button type='submit'>O</button>
						@endif
					</form>

				</div>
				@endforeach
			</div>
			@endforeach
		</div>
		@if($role == 3 and isset($del['name']))
		<div class='modal3123123'>
			<form class='modal_form' action="/edit" method="post">
				<input type="hidden" name='id' value="{{$del['id']}}">
				<input type="text" value={{$del['name']}}>
				<p>Состав:</p>
				<p>{{$del['ingridients']}}</p>
				<input type="text" value={{$del['cost']}}>
				<button type='submit'>O</button>
			</form>
			<form action="addIngridient" method='post'>
				@csrf
				<input type="hidden" name='id' value="{{$del['id']}}">
				<select class="form-select" aria-label="Default select example" name='ingridient_id'>
					@foreach($ingridients as $ingridient)
					<option value="{{$ingridient->id}}">{{$ingridient->name}}</option>
					@endforeach
				</select>
				<button type='submit'>+</button>
			</form>
			<form action="deleteIngridient" method='post'>
				@csrf
				<input type="hidden" name='id' value="{{$del['id']}}">
				<select class="form-select" aria-label="Default select example" name='ingridient_id'>
					@foreach($ingridientsIn as $ingridient)
					<option value="{{$ingridient['id']}}">{{$ingridient['name']}}</option>
					@endforeach
				</select>
				<button type='submit'>-</button>
			</form>
		</div>
		@endif
	</main>
	@include('templates.footer')
</body>

<script>
	let a = document.querySelector('.modal_form')
</script>

</html>