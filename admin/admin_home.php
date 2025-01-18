<!-- Main function -->
<?php include('../functions.php'); 

// Check admin is logged
	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/admin/admin_home.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/response.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>
</head>
<body>
	<nav style="background-color: #082567">

		<!-- <input type="checkbox" id="check">
		<label for="check" class="checkbtn">
			<i class="fas fa-bars"></i>
		</label> -->
		
		<label id="title">| Admin</label>
		
		<li style= "background-color: #082567; margin-left:1000px; height: 50px; display: inline-block; ">
					<!-- logged in user information -->

			    <?php  if (isset($_SESSION['user'])) : ?>
                <strong style="color: white;font-size: 15px; "><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan; font-size:15px;">(<?php echo ucfirst($_SESSION['user']['user_name']); ?>)</i> 
                    <img src="/pis/images/18.png" class="profile_info">
                </small>

            	<?php endif ?>
			 	</li>
				 
			
				
          
	</nav>
	
<ul>
				<li style= "background-color: #2980b9; width: 250px; height: 150px; display: inline-block; "><a  href="admin_home.php"style="font-size: 25px; margin: 100px; color: #fff; " >Home</a></li>
				<li style= "background-color: #2980b9; width: 250px; height: 150px; display: inline-block; "><a  href="add_user.php" style="font-size: 25px; margin: 50px; color: #fff; ">Add Staff</a></li>
				<li style= "background-color: #2980b9; width: 250px; height: 150px;display: inline-block; "><a  href="user_list.php" style="font-size: 25px;margin: 50px;color: #fff;  ">Edit Staff</a></li>
				<li style= "background-color: #2980b9; width: 250px; height: 150px; display: inline-block;"><a  href="add_item.php" style="font-size:15px;margin: 50px;  color: #fff; ">Schedule Clinic</a></li>
				<li style= "background-color: #2980b9; width: 250px; height: 150px; display: inline-block;"><a  href="item_list.php" style="font-size: 25px; margin: 50px;color: #fff; ">View Clinic</a></li>
				<li style= "background-color: #2980b9; width: 250px; height: 150px; display: inline-block;"><a  href="view_appoinments.php" style="font-size: 20px; margin: 50px;color: #fff; ">View Appoinments</a></li>
				<li style= "background-color: #2980b9; width: 250px; height: 150px; display: inline-block;"><a  href="sendmail.php" style="font-size: 25px; margin: 50px;color: #fff; ">Send Mail</a></li>
				<li style= "background-color: #2980b9; width: 250px; height: 150px; display: inline-block;"><a href="/pis/index.php?logout='1' "style="font-size: 25px;margin: 50px;color: #fff; " id="logout">Log out</a></li>
				
			    
				
</ul>


<!-- Error Mesage Displaying -->
	<?php if (isset($_SESSION['message'])):?>
		<div class="msg">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>	
		</div>
	<?php endif ?>

	<!-- ************************* error massage time out  ********************************** -->

	<script type="text/javascript">

	$(document).ready(function () {
	 
	window.setTimeout(function() {
	    $(".msg").fadeTo(1000, 0).slideUp(1000, function(){
	        $(this).remove();
	    });
	}, 5000);
	 
	});
	</script>






</body>
</html>