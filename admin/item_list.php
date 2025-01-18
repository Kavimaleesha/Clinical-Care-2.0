
<!-- function of admin -->
<?php include('functionsclinics.php'); 

if (!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }
?>


<!DOCTYPE html>
<html>
<head>

	<title>Item List</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/admin/item_list.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| View Clinics</label>
	      <ul>
	        <li><a href="admin_home.php">ADMIN HOME</a></li>
	        <li><a href="add_item.php">SCHEDULE CLINIC</a></li>
	        <li><a class="active" href="Item_list.php">VIEW CLINICS</a></li>

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

    <h1 id="head">Clinic List</h1>

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
    			<th id="clinicname">Clinic Name</th>
    			<th id="date">Date</th>
    			<th id="starttime">Start time</th>
				<th id="endtime">End time</th>
    			<th id="doctorincharge">Doctor In Charge</th>
    			<th id="edit">Action Edit</th>
    			<th id="delete">Action Delete</th>
    		</tr>
    	</thead>

    	<tbody> 
    		<?php while ($row = mysqli_fetch_array($results_set)) { ?>
    		<tr>
    			<td id = "clinicname"><?php echo $row['clinicname']; ?></td>
    			<td id="date"><?php echo $row['date']; ?></td> <!-- a refer as text align -->
    			<td id="starttime"><?php echo $row['starttime']; ?></td>
				<td id="endtime"><?php echo $row['endtime']; ?></td>
    			<td id="doctorincharge"><?php echo $row['doctorincharge']; ?></td>
    			<td id ="update_clinic">
    				<a href="update_clinic.php?edit=<?php echo $row['clinicid']; ?>" class="edit_btn" onClick="return confirm('Are you sure you want to Update this clinic?')">Edit</a>
    			</td>

    			<td id = "delete">
    				<a href="item_list.php?delete =<?php echo $row['clinicid']; ?>" class="del_btn" onClick="return confirm('Are you sure you want to Delete this clinic?')">Delete</a>
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
