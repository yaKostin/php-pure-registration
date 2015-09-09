<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form action="register.php" method="post" id="signup-form">
			<div class="form-group">
				<input type="text" name="firstname" placeholder="Имя" class="form-control"
					required pattern="([А-Я]{1}[а-яё]+|[A-Z]{1}[a-z]+)" maxlength="64">
			</div>
			<div class="form-group">
				<input type="text" name="lastname" placeholder="Фамилия" class="form-control" maxlength="64">
			</div>
			<div class="form-group">
				<input type="text" name="patronymic" placeholder="Отчество" class="form-control" maxlength="64">
			</div>
			<div class="form-group">
				<input type="email" name="email" placeholder="Email" class="form-control"
					required pattern="[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}" maxlength="120">
			</div>
			<div class="form-group">
				<input name="phone" placeholder="Телефон" class="form-control"
					pattern="\+380\([0-9]{2}\)[0-9]{3}-[0-9]{3}-[0-9]{2}">
			</div>
			<div class="form-group">
				<input name="password" id="password" type="password" placeholder="Пароль" class="form-control"
				required>
			</div>
			<div class="form-group">
				<input name="re_password" id="re_password" type="password" name="password" 
				placeholder="Повторите пароль" class="form-control" required>
			</div>
			<div class="form-group">
				<button class="btn btn-primary">Регистрация</button>
			</div>
		</form>
	</div>
</body>
</html>

<script type="text/javascript">
	window.onload = function() {
		document.getElementById('password').onchange = validatePassword;
		document.getElementById('re_password').onchange = validatePassword;
	}

	function validatePassword() {
		var password = document.getElementById('password').value;
		var re_password = document.getElementById('re_password').value;
		if (re_password!= password) {
			document.getElementById('re_password').setCustomValidity('Пароли не совпадают');
		} else {
			document.getElementById('re_password').setCustomValidity('');
		}
	}
</script>