<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<title>Авторизация</title>
</head>
<body>
	<header class="header-rest login container justify-content-center d-flex flex-column text-center">
			<img src="{{ asset('images/logo.png') }}" class="logo">
		<div class="row">
			<h1>Delivery Gang</h1>
		</div>
		<div class="row">
			<p style="font-size: 32px;">Asian Cuisine</p>
		</div>
	</header>
	
	<main>
		<form action="login" method="post" class="register-form">
			@csrf
			<div class="container">
			<input class="row" type="text" name="login" placeholder="логин">
			<input class="row" type="text" style="margin-top: 10px;" name="password" placeholder="пароль">
			<input class="row" type="submit">
			</div>
			<div class="container text-center mt-3">
				<h2>еще нет аккаунта?</h2>
				<a href="register" class="link-btn">регистрация</a>
			</div>
		</form>
	</main>
	@include('templates.footer')
</body>
</html>