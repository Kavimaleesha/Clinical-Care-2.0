<?php include('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Booking</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

<?php 
$diagnosis;
$checkup_name ;

$record = mysqli_query($db, "SELECT p.p_id, b.booking_id, d.diagnosis, c.checkup_name FROM  patient p JOIN   booking b ON p.p_id = b.p_id JOIN   diagnosis d ON p.p_id = d.p_id JOIN  checkup c ON p.p_id = c.p_id");
$r = mysqli_fetch_array($record);

	//$diagnosis=$r['diagnosis'];
	//$checkup_name=$r['checkup_name'];
  $diagnosis="";
  $checkup_name= "";
	
?>

</head>
<body>

	<nav>
    <label id="title">| View Booking</label>
      <ul>
      	<li><a href="booking.php">Home</a></li>
        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
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

<div class="container">

	<h1>Booking Details</h1><br><br>

	<form action="view_appoinment.php" method="post" id="frm">

    <label style="font-style: normal; font-weight: normal;">Patient Name :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $fname; ?>  <?php echo $lname; ?></label><br>

    
      <label style="font-style: normal; font-weight: normal;">Booking Date :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $booking_date; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Clinic :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $doctor; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Selected time :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $selected_time; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Reason :</label>
      <label style="font-style: normal; font-weight: normal;"><?php echo $reason; ?></label><br>

      <label style="font-style: normal; font-weight: normal;">Time :</label>
      <?php if ($approval_time=="00:00:00"): ?>
        <label style="font-style: normal; font-weight: normal;"> <b>Pending</b> </label><br>
      <?php else: ?>
        <label style="font-style: normal; font-weight: normal;"><?php echo $approval_time; ?></label><br>
      <?php endif ?>

      <label style="font-style: normal; font-weight: normal;">Status :</label>
      <?php if ($status==""): ?>
        <label style="font-style: normal; font-weight: normal;"> <b>Pending</b> </label><br>
      <?php else: ?>
        <label style="font-style: normal; font-weight: normal;"><?php echo $status; ?></label><br>
      <?php endif ?>

      <label style="font-style: normal; font-weight: normal;">Diagnosis :</label>
      <?php if ($diagnosis==""): ?>
        <label style="font-style: normal; font-weight: normal;"> <b>Pending</b> </label><br>
      <?php else: ?>
        <label style="font-style: normal; font-weight: normal;"><?php echo $diagnosis; ?></label><br>
      <?php endif ?>

      <label style="font-style: normal; font-weight: normal;">Checkups :</label>
      <?php if ($checkup_name==""): ?>
        <label style="font-style: normal; font-weight: normal;"> <b>Pending</b> </label><br>
      <?php else: ?>
        <label style="font-style: normal; font-weight: normal;"><?php echo $checkup_name; ?></label><br>
      <?php endif ?>

     </div>
    </div>
	</form>


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