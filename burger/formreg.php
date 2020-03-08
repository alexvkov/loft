<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<style>
		.form{
			width: 500px;
			margin: 0 auto;
		}
		.form__inpt{
			width: 100%;
			font-size: 17px;
			padding: 10px 0;
			display: block;
			margin-bottom: 10px;
		}
		.form__btn{
			background: #000;
			color: #fff;
			font-size: 17px;
			padding: 10px;
			width: 100%;
		}
		.form__title{
			text-align: center;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<form action="regsql.php" class="form" method="post">
		<h5 class="form__title">
			Вход
		</h5>
		<input type="email" required="" name="email" class="form__inpt">
		<button class="form__btn">
			Registrtion
		</button>
	</form>
</body>
</html>