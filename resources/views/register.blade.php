<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="preconnect" href="https://fonts-online.ru/fonts/kyiv-type-sans">
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
			<label>логин</label>
			<input type="text" name="name" placeholder="">
			<label>имя</label>
			<input type="text" name="login" placeholder="">
			<label>e-mail</label>
			<input type="text" name="email" placeholder="">
			<label>пароль</label>
			<input type="text" name="password" placeholder="">
			<label>подтвердите пароль</label>
			<input type="text" name="c_password" placeholder="">
			<input type="submit" value="регистрация">
		</form>
	</main>
</body>
</html>