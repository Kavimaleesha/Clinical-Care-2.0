<!-- function of admin -->
<?php include('functions.php');

if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

  $fname = '';
  $lame = '';
  $user_name = '';
  $email = '';
  $user_type = '';
  $password_1 ='';
  $password_2 = '';
  $staff_id = '';

if (isset($_GET['edit'])) {
  $staff_id = $_GET['edit'];
  $edit = true;
  $rec = mysqli_query($db, "SELECT * FROM staff WHERE staff_id = $staff_id"); 

  $record = mysqli_fetch_array($rec);
  $fname = $record['fname'];
  $lname = $record['lname'];
  $user_name = $record['user_name'];
  $email = $record['email'];
  $user_type = $record['user_type'];
  $staff_id = $record['staff_id'];
  $password=$record['password'];
  $password_1=".md5($password).";
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Staff</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/admin/add_user.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

</head>
<body>


	<nav>
	    <label id="title">| Edit Staff Member</label>
      <ul>
        <li><a href="admin_home.php">ADMIN HOME</a></li>
        <li><a href="add_user.php">ADD STAFF</a></li>
        <li><a class="active" href="user_list.php">EDIT STAFF</a></li>

        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
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


		<h1 id="head">Edit Staff Member</h1>

	<div class="container">
		<form id="reg" method="post" action="update.php">
			<?php include('../errors.php'); ?>
			<table border="0">
						
						<input type="hidden" name="staff_id" id="name" value="<?php echo $staff_id; ?>">
				<tr>
					<td>	
						<label>First Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="fname" placeholder="Enter Your First Name" value="<?php echo $fname; ?>" id="name"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>
						<label>Last Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="lname" placeholder="Enter Your Last Name" value="<?php echo $lname; ?>"id="name"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>	
						<label>User Name: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="user_name" placeholder="Enter Your User Name" value="<?php echo $user_name; ?>"id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Email: </label><br><br><br>
					</td>
					<td>
						<input type="email" name="email" placeholder="Enter Your Email" value="<?php echo $email; ?>" id="name"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>
						<label>User Type: </label><br><br><br>
					</td>
					<td>
						<select id="slt" name="user_type">
							<option value="<?php echo $user_type; ?>"><?php echo $user_type; ?></option>
							<option value="admin">Admin</option>
							<option value="doctor">Doctor</option>
							
							</select><br><br><br>	
					</td>	
				</tr>
									
			</table>
			
			<?php if ($edit == false): ?>
				<button type="submit" name="save" value="Save" id="submit">Save</button>
			<?php else: ?>
				<button type="submit" name="update" value="Update" id="submit">Update</button>
			<?php endif ?>
		</form>

	</div>

	<!-- *********************************************Reset password******************************************** -->

	<h1 id="head">Reset Password</h1>

	<div class="container">

	<form id="reg" method="post" action="update.php">

		 <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
				<table border="0">		
					<tr>
						<td>
							<label>New Password: </label><br><br><br>
						</td>
						<td>
							<input type="password" name="password_1"  id="name"><br><br><br>	
						</td>
					</tr>
					<tr>
						<td>
							<label>Confirm New Password: </label><br><br><br>
						</td>
						<td>
							<input type="password" name="password_2"  id="name"><br><br><br>	
						</td>
					</tr>
						
				</table>

				<button type="submit" name="reset" value="Reset" id="submit">Save</button>
				
	</form>


	</div>

	</body>
	</html>
