<!-- common function -->
<?php include('functions.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/admin/sign_up.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">
	<style type="text/css" href="css/login.css">
	body{
	margin: 0;
	padding: 0;
	background-image: url('/pis/images/97.jpg');
	background-size: cover;
}

</style>
</head>
<body>
		<h1 id="head">Sign Up</h1>

	<div class="container">
		<form id="reg" method="post" >
		<?php include('../errors.php'); ?>
		
			<table >
			
				<tr>
					<td>
						<label>First Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="fname" placeholder="Enter your First Name" id="name"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>	
						<label>Last Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="lname" placeholder="Enter your Last Name" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Birth Day: </label><br><br><br>
					</td>
					<td>
						<input type="date" name="birth_date" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Age: </label><br><br><br>
					</td>
					<td>
						<input type="number" name="age" placeholder="Enter your age" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Id Number: </label><br><br><br>
					</td>
					<td>
						<input type="number" name="id_number" placeholder="Enter only integer values" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Addressline 1: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="address_line1" placeholder="Enter your addressline 1" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Addressline 2: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="address_line2" placeholder="Enter your addressline 2" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
                    <td>    
                        <label>Email: </label><br><br><br>
                    </td>
                    <td>
                    <input type="email" name="email" placeholder="Enter Your Email" id="name"><br><br><br>  
                    </td>
                </tr>

				<tr>
					<td>
						<label>Gender: </label><br><br><br>
					</td>
					<td>
						<select id="slt" name="gender">
							<option value=""></option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							</select><br><br><br>	
					</td>	
				</tr>

				<tr>
					<td>
						<label>Civil Status: </label><br><br><br>
					</td>
					<td>
						<select id="slt" name="civil_status">
							<option value=""></option>
							<option value="single">Single</option>
							<option value="married">Married</option>
							</select><br><br><br>	
					</td>	
				</tr>

				<tr>
					<td>	
						<label>Password: </label><br><br><br>
					</td>
					<td>
						<input type="password" name="password_1" placeholder="Enter a password" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Confirm Password: </label><br><br><br>
					</td>
					<td>
						<input type="password" name="password_2" placeholder="Enter a password" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Date: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="date" id="name" readonly value="<?php echo( date("Y/m/d")) ?>"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Time: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="time" id="name" readonly value=" <?php
        date_default_timezone_set("Asia/Colombo");
        echo date("h:i");    ?>"><br><br><br>		
					</td>
				</tr>
			</table>
			
			<input type="submit" name="create_account" value="Create account" id="submit" >

			<div id="sign">
				Having an account? <a href="login_patient.php" id="sign_a"> Log in</a>
			</div>
		</form>

	</div>
</body>
</html>