<?php include('functions.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
<br>
	<div class="errormessege">
	<?php include('errors.php') ?>
				</div >

<div class="container">
	<div class="header">
		<h1>LogIn</h1>
	</div>
	<div class="main">
		<form method="post" action="login.php">
				
				

			<span>
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="username" name="user_name">
			</span><br>

			<span>
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="password" name="password">
			</span><br>

			<button type="submit" class="buttonsubmit" name="login_btn">Login</button>

		</form>
	
			<div id="sign">
				Click Here <a href="/pis/patient/login_patient.php" id="sign_a"> Patient Login</a>

				<br>

				Create an account  <a href="/pis/patient/sign_up.php" id="sign_a"> Sign up</a>	
			</div>
	</div>
</div>

</body>
</html>