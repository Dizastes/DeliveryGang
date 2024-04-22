<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Авторизация</title>
</head>
<body>
	<h1>Авторизация</h1>
	<form action="login" method="post">
		@csrf
		<input type="text" name="login">
		<input type="text" name="password">
		<input type="submit">
	</form>
</body>
</html>