<?php include('functions.php');
    
    
if (isset($_GET['edit_booking'])) {
    $booking_id = $_GET['edit_booking'];
    $edit_booking = true;
    $record_B = mysqli_query($db, "SELECT * FROM booking WHERE booking_id=$booking_id"); 

    $record = mysqli_fetch_array($record_B);
    $booking_date = $record['booking_date'];
	$selected_time = $record['selected_time'];
    $doctor = $record['doctor'];
    $reason = $record['reason'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Booking</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>
</head>
<body>

	<nav>
    <label id="title">| Edit Booking</label>
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

	<h1>Booking</h1>

	<form action="booking.php" method="post" id="frm">
		<input type="hidden" name="p_id" value="<?php echo $_SESSION['user']['p_id']; ?>">

        <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">

		<label>Booking Date</label><br><br>
		<input type="Date" name="booking_date" placeholder="Enter Booking Date" id="name" value="<?php echo $booking_date; ?>"><br><br>

		<label>Clinic</label><br><br>
		<select id="slt" name="doctor">
			<option value="<?php echo $doctor; ?>"><?php echo $doctor; ?></option>
			<option value="Breast Disease Clinic">Breast Disease Clinic</option>
							<option value="Cardiology clinic">Cardiology clinic</option>
							<option value="Cardio Thorasic Clinic">Cardio Thorasic Clinic</option>
							<option value="Chest Clinic">Chest Clinic</option>
							<option value="Dental Clinic">Dental Clinic</option>
							<option value="Dermatology Clinic">Dermatology Clinic</option>
							<option value="Diabetes & Endocrine Clinic">Diabetes & Endocrine Clinic</option>
							<option value="ENT Clinic">ENT Clinic</option>
							<option value="Eye Clinic">Eye Clinic</option>
							<option value="Forensic Psychatric Clinic">Forensic Psychatric Clinic</option>
							<option value="Gastro Enterology Clinic (Physician)">Gastro Enterology Clinic (Physician)</option>
							<option value="Gastro Intestinal Clinic (Surgeon)">Gastro Intestinal Clinic (Surgeon)</option>
							<option value="Genito Urinary Clinic">Genito Urinary Clinic</option>
							<option value="Heamatology Clinic">Heamatology Clinic</option>
							<option value="Medical Clinics">Medical Clinics</option>
							<option value="Nephrology Clinic">Nephrology Clinic</option>
							<option value="Neurology Clinic">Neurology Clinic</option>
							<option value="Neuro Surgical Clinic">Neuro Surgical Clinic </option>
							<option value="Nutrition Clinic">Nutrition Clinic</option>
							<option value="Oncology Clinic">Oncology Clinic</option>
							<option value="Onco Surgical Clinic">Onco Surgical Clinic</option>
							<option value="Orthopaedic Clinic">Orthopaedic Clinic</option>
							<option value="Paediatric Clinics">Paediatric Clinics</option>
							<option value="Pain Management Clinic">Pain Management Clinic</option>
							<option value="Palliative Care Clinic">Palliative Care Clinic</option>
							<option value="Plastic Surgery Clinic">Plastic Surgery Clinic</option>
							<option value="Psychiatric Clinic">Psychiatric Clinic</option>
							<option value="Rabies Treatment Clinic">Rabies Treatment Clinic</option>
							<option value="Rheumatology Clinic">Rheumatology Clinic</option>
							<option value="Speech Therapy Clinic">Speech Therapy Clinic</option>
							<option value="Surgical Clinics">Surgical Clinics</option>
							<option value="Vascular & Transplant Clinic">Vascular & Transplant Clinic</option>
		</select>
		<br><br>

		<label>Selected Time</label><br><br>
		<input type="Time" name="selected_time" placeholder="Select a time" id="name" value="<?php echo $selected_time; ?>"><br><br>

		<label>Reason</label><br><br>
		<textarea id="test" name="reason" value="<?php echo $reason; ?>"><?php echo $reason; ?></textarea><br><br>

        <!-- <label>Time</label><br><br>
        <input type="text" name="approval_time" id="name" readonly value=" <?php
        date_default_timezone_set("Asia/Colombo");
        echo date("h:i");
        ?>"><br><br>
 -->
        

		<input type="submit" name="bookig_update" value="Booking Update" id="booking">
	</form>

</div><br><br><br>

<div id="s">
<table id="allusers" class="table table-striped table-bordered" style="width: 100%">
    	<thead>
    		<tr>
    			<th>Booking Id</th>
    			<th id="a">Booking Date</th>
				<th id="a">Selected Time</th>
    			<th id="a">Reason</th>
    			<th id="a">Clinic</th>
    			<th id="a">Approval</th>
    			<th id="a">Approval Time</th>
    			<th> View Appoinment </th>
    			<th> Edit Appoinment</th>
    		</tr>
    	</thead>

    	<tbody> 
    		<?php 
            $p_id = $_SESSION['user']['p_id'];
            $result_A = mysqli_query($db,"SELECT * FROM booking WHERE p_id = $p_id");
            while ($row = mysqli_fetch_array($result_A)) { ?> 
    		<tr>
    			<td><?php echo $row['booking_id']; ?></td>
    			<td id="a"><?php echo $row['booking_date']; ?></td> <!-- a refer as text align -->
				<td id="a"><?php echo $row['selected_time']; ?></td>
    			<td id="a"><?php echo $row['reason']; ?></td>
    			<td id="a"><?php echo $row['doctor']; ?></td>
    			
                <td>
                    <?php if ($row['approval']==0): ?>
                        <button type="button" class="btn btn-danger btn-sm">Not Approval</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-success btn-sm">Aproveled</button>
                    <?php endif ?>
                </td>
            
                <td>
                    <?php if ($row['approval']==0): ?>
                        Procesing
                    <?php else: ?>
                    <?php echo $row['approval_time']; ?>
                    <?php endif ?>
                </td>
            

    			<td>
    				<a href="view_booking.php?view=<?php echo $row['booking_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i>VIEW</a>
    			</td>

    			<td>
    				<a href="edit_booking.php?edit_booking=<?php echo $row['booking_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-eye"></i>EDIT</a>
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