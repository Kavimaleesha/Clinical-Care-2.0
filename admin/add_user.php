<!-- function of admin -->
<?php include('functions.php'); 

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Staff Member</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/admin/add_user.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">
</head>
<body>


	<nav>
	    <label id="title">|Add Staff Member</label>
      <ul>
        <li><a href="admin_home.php">Admin Home</a></li>
        <li><a class="active" href="add_user.php">Add Staff</a></li>
        <li><a href="user_list.php">Edit Staff</a></li>

        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">Logout</a></li>
       
		<li>
				<!-- logged in user information -->

     		<?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['user_name']); ?>)</i> 
                    <img src="/pis/images/18.png" class="profile_info">
                 </small>

            <?php endif ?>
 		</li>

      </ul>
    </nav>


		<h1 id="head">Add Staff Member</h1>

	<div class="container">
		<form id="reg" method="post" action="add_user.php">

			<?php include('../errors.php'); ?>

			<table border="0">
				<tr>
					<td>	
						<label>First Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="fname" placeholder="Enter Your First Name" id="name"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>
						<label>Last Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="lname" placeholder="Enter Your Last Name" id="name"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>	
						<label>User Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="user_name" placeholder="Enter Your User Name" id="name"><br><br><br>		
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
						<label>User Type: </label><br><br><br>
					</td>
					<td>
						<select id="slt" name="user_type">
							<option value=""></option>
							<option value="admin">Admin</option>
							<option value="doctor">Doctor</option>
							
							</select><br><br><br>	
					</td>	
				</tr>
				<tr>
					<td>
						<label>Password: </label><br><br><br>	
					</td>
					<td>
						<input type="password" name="password_1" placeholder="Enter Your Password" id="name"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>
						<label>Confirm Password: </label><br><br><br>
					</td>
					<td>
						<input type="password" name="password_2" placeholder="Re-Enter Your Password" id="name"><br><br><br>	
					</td>
				</tr>
					
			</table>
			<input type="submit" name="add_user" value="+ Add" id="submit">
		</form>

		

	</div>

</body>
</html>
