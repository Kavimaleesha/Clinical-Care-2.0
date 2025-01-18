<?php include('functions.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>
</head>
<body>

	<nav>
    <label id="title">| Clinical Care</label>
      <ul>
      	<li><a href="booking.php">Home</a></li>
        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">Logout</a></li>
        <li>
				<!-- logged in user information -->

     		<?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']="Patient"; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['fname']); ?>)</i> 
                    <img src="/pis/images/17.png" class="profile_info">
                 </small>

            <?php endif ?>
 		</li>

      </ul>
    </nav>

<?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>

<?php
	$query = "SELECT * FROM scheduleclinic";
		$results_set = mysqli_query($db, $query);
?>

<div class="container">
<h1 id="head">Available Clinic List</h1>

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
    			<th id="appoinment">Make an Appoinment</th>
    			
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
    			<td id ="edit">
    				<a href="booking.php" class="edit_btn" onClick="return confirm('Are you sure you want to make an appoinment?')">Book</a>
    			</td>

    			

    		</tr>
    		<?php } ?>
    	</tbody>	
    </table>
   </div>
	

</div><br><br><br>


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