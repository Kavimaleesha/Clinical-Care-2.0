<?php include('functions.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Patient</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/login.css">
</head>
<body>
<br>

<div class="container">
	<div class="header">
		<h2>Patient Login</h2>
	</div>
	<div class="main">
		<form method="post" action="">
				
			<span>
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Enter your id number" name="id_number">
			</span><br>

			<span>
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Enter Password" name="password">
			</span><br>

			<button type="submit" class="button submit" name="sign_btn">Login</button>

		</form>
	
			<div id="sign">
				Create an account  <a href="sign_up.php" id="sign_a"> Sign up</a>
			</div>
	</div>
</div>

</body>
</html>