<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<title>Регистрация</title>
</head>
<body>
	<header class="header-rest register">
		<img src="{{ asset('images/logo.png') }}" class="logo">
		<div class="rest-name">
			<h1>
				Delivery Gang
			</h1>
			<p>
				Asian Сuisine
			</p>
		</div>
	</header>
	<main>
		<form action="register" method="post" class="register-form">
			@csrf
			<div class="container">
				<label class="row">логин</label>
				<input class="row" type="text" name="name" placeholder="">
				<label class="row">имя</label>
				<input class="row" type="text" name="login" placeholder="">
				<label class="row">e-mail</label>
				<input class="row" type="text" name="email" placeholder="">
				<label class="row">пароль</label>
				<input class="row" type="text" name="password" placeholder="">
				<label class="row">подтвердите пароль</label>
				<input class="row" type="text" name="c_password" placeholder="">
				<input class="row" type="submit" value="регистрация">
			</div>
			<div class="container text-center mt-3">
				<h2>уже есть аккаунт?</h2>
				<a href="login" class="link-btn">вход</a>
			</div>
		</form>
	</main>
	@include('templates.footer')
</body>
</html>