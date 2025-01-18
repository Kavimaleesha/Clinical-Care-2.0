<!-- common function -->
<?php include('../functions.php');

// Add Diagnosis ***********************************************************************************

	$p_id="";
	$diagnosis_date= "";
	$diagnosis="";
	$staff_id = "";

if (isset($_POST['add_medicine'])) {

	$p_id=$_POST['p_id'];
	$diagnosis_date=$_POST['diagnosis_date'];
	$diagnosis=$_POST['diagnosis'];
	$staff_id=$_POST['staff_id'];
	
	// form validation: ensure that the form is correctly filled
		if (empty($p_id)) { 
			array_push($errors, "Patient Id is required"); 
		}
		if (empty($diagnosis_date)) { 
			array_push($errors, "Diagnosis date is required"); 
		}
		
		if (empty($diagnosis)) { 
			array_push($errors, "Diagnosis is required"); 
		}

		if (empty($staff_id)) { 
			array_push($errors, "Staff Id is required"); 
		}

		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			// $password = md5($password_1);//encrypt the password before saving in the database

	mysqli_query ($db,"INSERT INTO `diagnosis` (`p_id`,`diagnosis_date`, `diagnosis`, `staff_id`) VALUES ('$p_id', '$diagnosis_date', '$diagnosis', '$staff_id');");

	header('location: doctor_home.php');
		}else{
		array_push($errors, "Connection errors !");	
	
}

}		

// update Diagnosis
	if (isset($_POST['update_diagnosis'])) {

		$staff_id     =$_POST['staff_id'];
		$p_id     	=$_POST['p_id'];
		$diagnosis   =$_POST['diagnosis'];
		$diagnosis_date   =$_POST['diagnosis_date'];
		$diagnosis_id   =$_POST['diagnosis_id'];
	
		if (empty($staff_id)) {
			array_push($errors, "Add the Staff Id");	
		}
		if (empty($p_id)) {
			array_push($errors, "Add the Patient Id");	
		}

		if (empty($diagnosis)) {
			array_push($errors, "Add the Diagnosis");	
		}

		if (empty($diagnosis_date)) {
			array_push($errors, "Add the Diagnosis Date");	
		}

		if (empty($diagnosis_id)) {
			array_push($errors, "Add the Diagnosis Id");	
		}


		if (count($errors)== 0) {
			mysqli_query($db,"UPDATE diagnosis SET staff_id='$staff_id', p_id='$p_id', diagnosis='$diagnosis', diagnosis_date='$diagnosis_date', diagnosis_id='$diagnosis_id' WHERE diagnosis_id= '$diagnosis_id'");
			$_SESSION['message'] = "Diagnosis is updated!";
	  		header('location: doctor_home.php');
		}
	}

// Delete Diagnosis ***********************************************************************************

if (isset($_GET['delete_diagnosis'])) {
	  $diagnosis_id = $_GET['delete_diagnosis'];
	  mysqli_query($db, "DELETE FROM diagnosis WHERE diagnosis_id ='$diagnosis_id'"); 
	  
	  $_SESSION['message'] = "Address deleted!";
	  header('location: doctor_home.php');

	}

// Add Checkup ***********************************************************************************

	$p_id="";
	$checkup_name= "";
	$doctor_comment="";
	$checkup_date="";
	$staff_id = "";

if (isset($_POST['checkup'])) {

	$p_id=$_POST['p_id'];
	$checkup_name=$_POST['checkup_name'];
	$doctor_comment=$_POST['doctor_comment'];
	$checkup_date=$_POST['checkup_date'];
	$staff_id=$_POST['staff_id'];
	
	// form validation: ensure that the form is correctly filled
		if (empty($p_id)) { 
			array_push($errors, "Patient Id is required"); 
		}
		if (empty($checkup_name)) { 
			array_push($errors, "Checkup Name is required"); 
		}
		
		if (empty($doctor_comment)) { 
			array_push($errors, "Doctor comment is required"); 
		}
		if (empty($checkup_date)) { 
			array_push($errors, "Date comment is required"); 
		}

		if (empty($staff_id)) { 
			array_push($errors, "Staff Id is required"); 
		}
	
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			// $password = md5($password_1);//encrypt the password before saving in the database

	mysqli_query ($db,"INSERT INTO `checkup` (`p_id`,`checkup_name`, `doctor_comment`,`checkup_date`, `staff_id`) VALUES ('$p_id', '$checkup_name', '$doctor_comment', '$checkup_date','$staff_id');");

	header('location: doctor_home.php');
		}else{
		array_push($errors, "Connection errors !");	
}
}	
// update checkup
	if (isset($_POST['update_checkup'])) {

		$staff_id     =$_POST['staff_id'];
		$p_id     	=$_POST['p_id'];
		$checkup_name   =$_POST['checkup_name'];
		$doctor_comment   =$_POST['doctor_comment'];
		$checkup_date=$_POST['checkup_date'];
		$checkup_id   =$_POST['checkup_id'];
	
		if (empty($staff_id)) {
			array_push($errors, "Add the Staff Id");	
		}
		if (empty($p_id)) {
			array_push($errors, "Add the Patient Id");	
		}

		if (empty($checkup_name)) {
			array_push($errors, "Add the checkup name");	
		}

		if (empty($doctor_comment)) {
			array_push($errors, "Add the doctor comment");	
		}

		if (empty($checkup_date)) { 
			array_push($errors, "Date comment is required"); 
		}

		if (empty($checkup_id)) {
			array_push($errors, "Add the checkup id");	
		}


		if (count($errors)== 0) {
			mysqli_query($db,"UPDATE checkup SET staff_id='$staff_id', p_id='$p_id', checkup_name='$checkup_name', doctor_comment='$doctor_comment', checkup_date='$checkup_date', checkup_id='$checkup_id' WHERE checkup_id= '$checkup_id'");
			$_SESSION['message'] = "Checkup is updated!";
	  		header('location: doctor_home.php');
		}
	}	

// Delete Checkup ***********************************************************************************

if (isset($_GET['delete_checkup'])) {
	  $checkup_id = $_GET['delete_checkup'];
	  mysqli_query($db, "DELETE FROM checkup WHERE checkup_id ='$checkup_id'"); 
	  
	  $_SESSION['message'] = "Address deleted!";
	  header('location: doctor_home.php');

	}
// Admit and Discharge *******************************************************************************

if (isset($_GET['admit'])) {
    $p_id = $_GET['admit'];
    $admitdischarge = "Admit";
  }

 if (isset($_GET['discharge'])) {
    $p_id = $_GET['discharge'];
    $admitdischarge = "Discharge";
  }

// Admit *******************************************************************************************

	$p_id="";
	$admitdischarge= "";
	$w_id="";
	$staff_id = "";
	$comment ="";
	$admitdischarge_date ="";

if (isset($_POST['admit_patient'])) {

	$p_id=$_POST['p_id'];
	$admitdischarge=$_POST['admitdischarge'];
	$comment=$_POST['comment'];
	$admitdischarge_date=$_POST['admitdischarge_date'];
	$w_id=$_POST['w_id'];
	$staff_id=$_POST['staff_id'];
	

	// form validation: ensure that the form is correctly filled
		if (empty($p_id)) { 
			array_push($errors, "Patient Id is required"); 
		}
		if (empty($admitdischarge)) { 
			array_push($errors, "Admit is required"); 
		}

		if (empty($comment)) { 
			array_push($errors, "Comment is required"); 
		}

		if (empty($admitdischarge_date)) { 
			array_push($errors, "Admitdischarge Date is required"); 
		}
		
		if (empty($w_id)) { 
			array_push($errors, "Ward is required"); 
		}

		if (empty($staff_id)) { 
			array_push($errors, "Staff Id is required"); 
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			// $password = md5($password_1);//encrypt the password before saving in the database

	mysqli_query ($db,"INSERT INTO `admit`(`p_id`,`admitdischarge`,`staff_id`,`w_id`,`admitdischarge_date`,`comment`) VALUES ('$p_id', '$admitdischarge', '$staff_id', '$w_id', '$admitdischarge_date', '$comment');");

	mysqli_query($db,"UPDATE patient SET discharging_patient='$admitdischarge',w_id='$w_id' WHERE p_id='$p_id' ");

	header('location: doctor_home.php');
		}else{
		array_push($errors, "Connection errors !");		
}
}	
// Discharge *******************************************************************************************

	$p_id="";
	$admitdischarge= "";
	$staff_id = "";
	$comment ="";
	$admitdischarge_date ="";

if (isset($_POST['discharge_patient'])) {

	$p_id=$_POST['p_id'];
	$admitdischarge=$_POST['admitdischarge'];
	$comment=$_POST['comment'];
	$admitdischarge_date=$_POST['admitdischarge_date'];
	$staff_id=$_POST['staff_id'];

	// form validation: ensure that the form is correctly filled
		if (empty($p_id)) { 
			array_push($errors, "Patient Id is required"); 
		}
		if (empty($admitdischarge)) { 
			array_push($errors, "Admit is required"); 
		}

		if (empty($comment)) { 
			array_push($errors, "Comment is required"); 
		}

		if (empty($admitdischarge_date)) { 
			array_push($errors, "Admitdischarge Date is required"); 
		}
		
		if (empty($staff_id)) { 
			array_push($errors, "Staff Id is required"); 
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			// $password = md5($password_1);//encrypt the password before saving in the database

	mysqli_query($db,"UPDATE admit SET admitdischarge_date='$admitdischarge_date',comment='$comment' WHERE p_id='$p_id' ");

	mysqli_query($db,"UPDATE patient SET discharging_patient='$admitdischarge' WHERE p_id='$p_id'");

	header('location: doctor_home.php');
		}else{
		array_push($errors, "Connection errors !");	
	
}

}	
// update AdmitDischarge********************************************************************************

	if (isset($_POST['edit_p'])) {

		$staff_id     =$_POST['staff_id'];
		$p_id     	=$_POST['p_id'];
		$fname = $_POST['fname'];
    	$lname =$_POST['lname'];
    	$id_number= $_POST['id_number'];
    	$contact_no = $_POST['contact_no'];
    
	
		if (empty($staff_id)) {
			array_push($errors, "Add the Staff Id");	
		}
		if (empty($p_id)) {
			array_push($errors, "Add the Patient Id");	
		}

		if (empty($fname)) {
			array_push($errors, "Add the first bame");	
		}

		if (empty($lname)) {
			array_push($errors, "Add the last name");	
		}

		
		if (empty($id_number)) {
			array_push($errors, "Add the ID number");	
		}
		if (empty($contact_no)) {
			array_push($errors, "Add the contact number");	
		}

		if (count($errors)== 0) {
			mysqli_query($db,"UPDATE patient SET p_id='$p_id', fname='$fname', lname='$lname', id_number='$id_number' , contact_no='$contact_no' WHERE p_id= '$p_id'");

			
			
			$_SESSION['message'] = "Checkup is updated!";
	  		header('location: doctor_home.php');
		}
	}	

// Downloads files
if (isset($_GET['view_files'])) {
    $file_id = $_GET['view_files'];

    // fetch file to download from database
    $sql = "SELECT * FROM file WHERE file_id=$file_id";
    $resultH = mysqli_query($db, $sql);

    $file = mysqli_fetch_assoc($resultH);
    $filepath = '../nurse/uploads/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename='.basename($filepath));
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            readfile('../nurse/uploads/' . $file['file_name']);
    }
}

?>

