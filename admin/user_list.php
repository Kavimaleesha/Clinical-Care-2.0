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

	<title>Staff Member List</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/admin/user_list.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Staff List</label>
	      <ul>
	        <li><a href="admin_home.php">ADMIN HOME</a></li>
	        <li><a href="add_user.php">ADD STAFF</a></li>
	        <li><a class="active" href="user_list.php">VIEW STAFF</a></li>

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

    <h1 id="head">All Staff List</h1>

    <?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>
    
    <div id="s"> <!-- purple div -->
    <table id="allusers" class="table table-striped table-bordered" style="width: 100%">
    	<thead>
    		<tr>
    			<th>Staff Id</th>
    			<th id="a">First Name</th>
    			<th id="a">Last Name</th>
    			<th id="a">User Name</th>
    			<th id="a">User Type</th>
    			<th id="a">Email</th>
    			<th>Action Edit</th>
    			<th>Action Delete</th>
    		</tr>
    	</thead>

    	<tbody> 
    		<?php while ($row = mysqli_fetch_array($result_set)) { ?>
    		<tr>
    			<td><?php echo $row['staff_id']; ?></td>
    			<td id="c"><?php echo $row['fname']; ?></td> <!-- a refer as text align -->
    			<td id="c"><?php echo $row['lname']; ?></td>
    			<td id="c"><?php echo $row['user_name']; ?></td>
    			<td id="c"><?php echo $row['user_type']; ?></td>
    			<td id="c"><?php echo $row['email']; ?></td>
    			<td>
    				<a href="update.php?edit=<?php echo $row['staff_id']; ?>" class="edit_btn">Edit</a>
    			</td>

    			<td>
    				<a href="user_list.php?del=<?php echo $row['staff_id']; ?>" class="del_btn" onClick="return confirm('Are you sure you want to Delete the User?')">Delete</a>
    			</td>

    		</tr>
    		<?php } ?>
    	</tbody>	
    </table>
   </div>

    <!-- data table (search, show entries etc..) -->
    <script>
  	$(document).ready(function() {
    $('#allusers').DataTable();
	} );
	</script>

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
