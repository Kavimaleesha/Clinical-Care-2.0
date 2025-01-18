<?php include('../functions.php');

// schedule clinic

//// Add item
	if (isset($_POST['add_item'])) {

	// receive all input values from the form
		$clinicid;
		$clinicname    = ($_POST['clinics']);
		$date       = ($_POST['date']);
		$starttime  = ($_POST['starttime']);
		$endtime  = ($_POST['endtime']);
		$doctorincharge  = ($_POST['doctorincharge']);


		
		// form validation: ensure that the form is correctly filled
		if (empty($clinicname)) { 
			array_push($errors, "Clinic Name is required"); 
		}
		if (empty($date)) { 
			array_push($errors, "Date is required"); 
		}
		
		if (empty($starttime)) { 
			array_push($errors, "Start Time is required"); 
		}

		if (empty($endtime)) { 
			array_push($errors, "End Time is required"); 
		}

		if (empty($doctorincharge)) { 
			array_push($errors, "Doctor InCharge  is required"); 
		}
				

		// add item if there are no errors in the form
		if (count($errors) == 0) {

				
							
				$query = "INSERT INTO scheduleclinic (`clinicname`, `date`, `starttime`, `endtime`,`doctorincharge`) 
				VALUES('$clinicname','$date','$starttime','$endtime','$doctorincharge')";
				mysqli_query($db, $query);

				$message = $clinicname ."  "."  is scheduled for ". $date ."  " . " from " . $starttime . "  " . " to " . $endtime;
				
				$query2 = "INSERT INTO `notification` (`message`) VALUES ('$message')";
				mysqli_query($db, $query2);


				$_SESSION['message']  = "Clinic is scheduled successfully!!!";
				header('location: /pis/admin/item_list.php');
			}else{
						array_push($errors, "Connection errors !");		
			}
		}


	// *************************************************************************************************************
		// Insert data table from database

		$query = "SELECT * FROM scheduleclinic";
		$results_set = mysqli_query($db, $query);
 	// // *********************************************************************************

	//Delete Item Records

	  if (isset($_GET['delete'])) {
	  $clinicid = $_GET['delete'];
	  mysqli_query($db, "DELETE FROM scheduleclinic WHERE clinicid ='$clinicid'"); 

	  $message = $clinicname ."  "."  which was scheduled for ". $date ."  ". "was deleted by admin. Sorry for the inconvenience." ;
				
	$query3 = "INSERT INTO `notification` (`message`) VALUES ('$message')";
	mysqli_query($db, $query3);
	  
	  $_SESSION['message'] = "Address deleted!";
	  header('location: /pis/admin/item_list.php');
	}
	// // *********************************************************************************

	//Update Records

	 /*if (isset($_POST['update_clinic'])) {
		// Get clinic ID from the URL parameter
    	$clinicid = $_GET['edit'];
		// Retrieve other form data
		$clinicname = $_POST['clinicname'];
		$date = $_POST['date'];
		$starttime = $_POST['starttime'];
		$endtime = $_POST['endtime'];
		$doctorincharge = $_POST['doctorincharge'];

		mysqli_query($db,"UPDATE scheduleclinic SET clinicid = '$clinicid' ,clinicname ='$clinicname' , date ='$date', starttime ='$starttime', endtime = '$endtime', doctorincharge = '$doctorincharge' WHERE clinicid ='$clinicid'");

		$message = $clinicname ."  ". "is rescheduled to". $date ." from " . $starttime . "  " . " to " . $endtime . "Please update your appoinments according to the new date.";
				
		$query3 = "INSERT INTO `notification` (`message`) VALUES ('$message')";
			mysqli_query($db, $query3);
		
		$_SESSION['message'] = $clinicid;
		header('location: item_list.php');

	 }	*/

	 

     ?>

	 