<?php include('function.php');



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Appoinments</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

<?php 
$p_id ="";
$fname = "";
$lname ="";
$clinic_name = "";
$date = "";
$reason = "";
$doctorincharge = "";
$diagnosis="";
$checkup_name ="";


if (isset($_POST['view_appoinment'])) {
    $p_id = $_POST['p_id'];
    $fname = $_POST['fname'];
    $lname =$_POST['lname'];
    $clinic_name = $_POST['clinic_name'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $doctorincharge = $_POST['doctorincharge'];
	$diagnosis=$_POST['diagnosis'];
	$checkup_name=$_POST['checkup_name'];
	$doctor_comment=$_POST['doctor_comment'];
	
}

?>

</head>
<body>

	<nav>
    <label id="title">| View Appoinments</label>
      <ul>
      	<li><a href="doctor_home.php">Home</a></li>
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
	//$query = ("SELECT  * FROM booking ");
	$query = ("SELECT   p.p_id,    p.fname,   b.doctor,    b.booking_date,   b.reason,   s.doctorincharge FROM    patient p JOIN   booking b ON p.p_id = b.p_id LEFT JOIN   scheduleclinic s ON b.doctor = s.clinicname");
		$results_set = mysqli_query($db, $query);
?>

<div class="container">

	<h1>Clinic Appoinments</h1><br><br>

	<div id="s"> <!-- purple div -->
    <table id="allusers" class="table table-striped table-bordered" style="width: 100%">
    	<thead>
    		<tr>
                <th id="p_id">Patient ID</th>
                <th id="patientname">Patient Name</th>
    			<th id="clinicname">Clinic Name</th>
    			<th id="date">Date</th>
                <th id="reason">Reason</th>
                <th id="doctorincharge">Doctor In Charge</th>
    			<th id="diagnosis">Diagnosis</th>
				<th id="checkups">Checkups</th>
    				
    		</tr>
    	</thead>

    	<tbody> 
    		<?php while ($row = mysqli_fetch_array($results_set)) { ?>
    		<tr>
                <td id ="p_id"><?php echo $row['p_id']; ?></td>
                <td id ="fname"><?php echo $row['fname']; ?></td>
    			<td id ="clinicname"><?php echo $row['doctor']; ?></td>
    			<td id="date"><?php echo $row['booking_date']; ?></td> 
    			<td id="reason"><?php echo $row['reason']; ?></td>
    			<td id="doctorincharge"><?php echo $row['doctorincharge']; ?></td>
    			<td id ="edit">
				<a href="add_diagnosis.php?add_diagnosis=<?php echo $row['p_id']; ?>" class="edit_btn" >Add Diagnosis</a>
    			</td>
                <td id ="edit">
    				<a href="add_checkup.php?add_checkup=<?php echo $row['p_id']; ?>" class="edit_btn">Add Checkups</a>
    			</td>

    			

    		</tr>
    		<?php } ?>
    	</tbody>	
    </table>
   </div>
      
      

     
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