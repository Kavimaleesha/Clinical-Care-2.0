<?php
	session_start();
	// Database connection
	$db = mysqli_connect('localhost','root','','pis');

	// variable declaration Loging Form
	$staff_id=0;
	$user_name = "";
	$email    = "";
	$errors   = array(); 
	// login
	if (isset($_POST['login_btn'])) {

		$user_name = ($_POST['user_name']);
		$password = ($_POST['password']);
	// Check Username & password
		if (empty($user_name)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
// Encrypt the password(Hashed)
		if (count($errors)==0) {
			$password = md5($password);

			$query = "SELECT * FROM staff WHERE user_name='$user_name' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['message']  = "You are now logged in";
					header('location: admin/admin_home.php');	

				}elseif ($logged_in_user['user_type'] == 'doctor') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['message']  = "You are now logged in";
					header('location: doctor/doctor_home.php');

				}else
				{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['message']  = "You are now logged in";
					header('location: /pis/receptionist/receptionist_home.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	// Ceeck the User Logged.............................................................................

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	function isDoctor()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'doctor') {
			return true;
		}else{
			return false;
		}
	}

	

	function isPatient()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'patient') {
			return true;
		}else{
			return false;
		}
	}

	


?>
