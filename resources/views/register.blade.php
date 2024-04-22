<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация</title>
</head>
<body>
	<h1>Регистрация</h1>
	<form action="register" method="post">
		@csrf
		<input type="text" name="name" placeholder="name">
		<input type="text" name="email" placeholder="email">
		<input type="text" name="login" placeholder="login">
		<input type="text" name="password" placeholder="password">
		<input type="text" name="c_password" placeholder="c_password">
		<input type="submit">
	</form>
</body>
</html>