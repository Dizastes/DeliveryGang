<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Role Manager</title>
	<script>
		let select;
		let role;
	</script>
</head>
<body>
	@if ($role == 3)
		@foreach ($users as $user)
		<form action="role/changeRole" method="post" id="change_form{{$user->id}}">
			@csrf
			<input type="hidden" value="{{$user->id}}" name="id">
			<p>{{$user->login}}</p>
			<select name="new_role" id="select_role{{$user->id}}">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
		</form>
		<script>
			document.querySelector("#select_role{{$user->id}}").addEventListener('change', function (e) {
			  document.querySelector('#change_form{{$user->id}}').submit();
			})

			role = "{{$user->privilege}}";
			select = document.querySelector('#select_role{{$user->id}}');

			for (let i = 0; i < select.childNodes.length; i++) {
			    if (select.childNodes[i].value == role) {
			      select.childNodes[i].selected = true;
			      break;
			    }        
			}
		</script>
		@endforeach
	@endif
</body>
</html>