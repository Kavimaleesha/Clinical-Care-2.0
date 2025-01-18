<!-- function of admin -->
<?php include('functions.php');

if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
	
	$clinicid = $clinicname = $date = $starttime = $endtime = $doctorincharge = '';	
	$edit = false;

	
if (isset($_GET['edit'])) {
  $clinicid = $_GET['edit'];
  $edit = true;
  $rec = mysqli_query($db, "SELECT * FROM scheduleclinic WHERE clinicid = $clinicid"); 

  

  $record = mysqli_fetch_array($rec);
  	
	$clinicname = $record['clinicname'];
	$date = $record['date'];
	$starttime = $record['starttime'];
	$endtime = $record['endtime'];
	$doctorincharge = $record['doctorincharge'];

	
  }

?>

<style type="text/css">
	
	body{
	margin: 0;
	padding: 0;
	background-image: url('/pis/images/104.jpg');
	background-size: cover;
	font-family: sans-serif;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Update Clinic</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/admin/add_item.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<!-- Print Document -->
<!-- <script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script> -->

</head>
<body>


	<nav>
	    <label id="title">| Update Clinic</label>
      <ul>
        <li><a href="admin_home.php">Admin Home</a></li>
        <li><a href="add_item.php">Schedule Clinic</a></li>
        <li><a class="active" href="user_list.php">Update Clinic</a></li>

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


		<h1 id="head">Update Clinic</h1>

	<div class="container">
		<form id="reg" method="post" action="update_item.php">
			<?php include('../errors.php'); ?>
			<table border="0">
						
			<input type="hidden" name="clinicid" value="<?php echo $clinicid; ?>">	
				<tr>
					<td>	
						<label>Clinic Name: </label><br><br><br>
					</td>
					<td>
						<select id="clinicname" name="clinicname" placeholder="Select a Clinic">
							
							<option value="<?php echo $clinicname; ?>"><?php echo $clinicname; ?></option>
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
							<option value="Neuro Surgical Clinic ">Neuro Surgical Clinic </option>
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
							</select><br><br><br>	
					</td>	
				</tr>
				<tr>
					<td>
						<label>Start Time: </label><br><br><br>
					</td>
					<td>
						<input type="time" name="starttime"  value="<?php echo $starttime; ?>" id="starttime"><br><br><br>	
					</td>
				</tr>
				<tr>
					<td>	
						<label>End Time:</label><br><br><br>
					</td>
					<td>
						<input type="time" name="endtime"  value="<?php echo $endtime; ?>"id="endtime"><br><br><br>		
					</td>
				</tr>

				<tr>
					<td>	
						<label>Doctor in Charge: </label><br><br><br>
					</td>
					<td>
						<input type="text" name="doctorincharge"  value="<?php echo $doctorincharge; ?>" id="doctorincharge"><br><br><br>		
					</td>
				</tr>
									
			</table>
			
			<?php if ($edit == true): ?>
				<button type="submit" name="save" value="Save" id="submit">Save</button>
			<?php else: ?>
				<button type="submit" name="update_item" value="Update" id="submit">Update</button>
			<?php endif ?>

			<!-- <button onclick="printContent('inventory')" class="submit">Print</button> -->
		</form>

	</div>

	</body>
	</html>

