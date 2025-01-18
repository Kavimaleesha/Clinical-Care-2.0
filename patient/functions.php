<?php include('../functions.php');
// ****************************************** Sign Up ************************************

if (isset($_POST['create_account'])) {
 
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $birth_date=$_POST['birth_date'];
    $age=$_POST['age'];
    $id_number=$_POST['id_number'];
    $address_line1=$_POST['address_line1'];
    $address_line2=$_POST['address_line2'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $civil_status=$_POST['civil_status'];
    $password_1  = ($_POST['password_1']);
    $password_2  = ($_POST['password_2']);
    $date  = ($_POST['date']);
    $time  = ($_POST['time']);
 
    // form validation: ensure that the form is correctly filled
        if (empty($fname)) {
            array_push($errors, "First Name is required");
        }
        if (empty($lname)) {
            array_push($errors, "Last Name is required");
        }
       
        if (empty($birth_date)) {
            array_push($errors, "Birthday is required");
        }
 
        if (empty($age)) {
            array_push($errors, "Age is required");
        }
 
        if (empty($id_number)) {
            array_push($errors, "Id Number is required");
        }
 
        if (empty($address_line1)) {
            array_push($errors, "Address Line 1 is required");
        }
       
        if (empty($address_line2)) {
            array_push($errors, "Address Line 2 is required");
        }
 
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
 
        if (empty($gender)) {
            array_push($errors, "Gender is required");
        }
       
        if (empty($civil_status)) {
            array_push($errors, "Civil Status is required");
        }
 
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
 
        if (empty($date)) {
            array_push($errors, "Date is required");
        }
        if (empty($time)) {
            array_push($errors, "Time is required");
        }
 
        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
 
    mysqli_query ($db,"INSERT INTO `patient` (`p_id`,`fname`, `lname`, `birth_date`, `age`, `id_number`, `address_line1`, `address_line2`, `email`, `gender`, `civil_status`, `password`, `date`, `time`) VALUES (NULL, '$fname', '$lname', '$birth_date', '$age', '$id_number', '$address_line1', '$address_line2','$email', '$gender', '$civil_status', '$password', '$date', '$time');");
 
    //Navigate to login page after registration
    header('location: login_patient.php');
   
 
}else{
                        array_push($errors, "Connection errors !");
}
}      		
// ******************************** Login Patient ***********************************************
// LOGIN PATIENT
if (isset($_POST['sign_btn'])) {

    //Security SQL Injections
  $id_number = mysqli_real_escape_string($db, $_POST['id_number']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($id_number)) {
    array_push($errors, "Id Number is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);

    $query = "SELECT * FROM patient WHERE id_number='$id_number' AND password='$password'";
    $resultss = mysqli_query($db, $query);
    if (mysqli_num_rows($resultss) == 1) {

     // check if user is admin or user
        $logged_in_user = mysqli_fetch_assoc($resultss);

    
          $_SESSION['user'] = $logged_in_user;
          $logged_in_user['user_type'] = 'patient';

          $_SESSION['message']  = "You are now logged in";
          header('location: booking.php');

      }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
// ***************************************************************************************************************
  // 
// Booking
	if (isset($_POST['booking'])) {
	// receive all input values from the form
		$p_id          = ($_POST['p_id']);
		$booking_date  = ($_POST['booking_date']);
		$selected_time = ($_POST['selected_time']);
		$doctor        = ($_POST['doctor']);
		$reason        = ($_POST['reason']);
		$approval	   =0;
		// form validation: ensure that the form is correctly filled
		if (empty($p_id)) { 
			array_push($errors, "p_id is required"); 
		}
		
		if (empty($booking_date)) { 
			array_push($errors, "Booking Date is required"); 
		}

		if (empty($selected_time)) { 
			array_push($errors, "Seleted Time is required"); 
		}

		if (empty($doctor)) { 
			array_push($errors, "Doctor is required"); 
		}

		if (empty($reason)) { 
			array_push($errors, "Reason is required"); 
		}
		// booking item if there are no errors in the form
		if (count($errors) == 0) {				
				$query = "INSERT INTO booking (`p_id`,`booking_date`,`selected_time`,`doctor`,`reason`,`approval`) 
						  VALUES('$p_id','$booking_date','$selected_time','$doctor','$reason','$approval')";
				mysqli_query($db, $query);

        //Notifications
				$message = "You made an appoinment for"."  " .$doctor ."  "." on ". $booking_date ."  " . " at " . $selected_time . " .  " . "  "."You will get a notification when your appoinment is approved mentioning your time slot." ;
				
				$query2 = "INSERT INTO `notification` (`message`, `p_id`) VALUES ('$message','$p_id')";
				mysqli_query($db, $query2);

				$_SESSION['message']  = "New booking is successfully added!!";
				header('location: /pis/patient/booking.php');
			}else{
						array_push($errors, "Connection errors !");		
			}
		}

//Booking View ************************************************************************************************

		if (isset($_GET['view'])) {
          $booking_id = $_GET['view'];
          
		  $record = mysqli_query($db, "SELECT booking.*, patient.fname, patient.lname
          FROM booking
          JOIN patient ON booking.p_id = patient.p_id
          WHERE booking.booking_id = $booking_id;
          ");

          $r = mysqli_fetch_array($record);
          $booking_id=$r['booking_id'];
		  $fname = $r['fname'];
          $lname = $r['lname'];
          $booking_date=$r['booking_date'];
          $doctor=$r['doctor'];
		  $selected_time=$r['selected_time'];
          $reason=$r['reason'];
          $approval_time=$r['approval_time'];
          $status=$r['status'];
}
// updateBooking
	if (isset($_POST['bookig_update'])) {

		$booking_id     =$_POST['booking_id'];
		$selected_time  =$_POST['selected_time'];
		$doctor     	=$_POST['doctor'];
		$booking_date   =$_POST['booking_date'];
		$reason   		=$_POST['reason'];

		if (empty($booking_date)) {
			array_push($errors, "Add the Booking Date");	
		}
		if (empty($selected_time)) {
			array_push($errors, "Add the Time");	
		}
		if (empty($reason)) {
			array_push($errors, "Add the Reason");	
		}

		if (empty($doctor)) {
			array_push($errors, "Add the doctor");	
		}

		if (count($errors)== 0) {
			mysqli_query($db,"UPDATE booking SET  booking_date='$booking_date',selected_time='$selected_time', doctor='$doctor', reason='$reason' WHERE booking_id= '$booking_id'");
			$_SESSION['message'] = "Booking is updated!";
	  		header('location: booking.php');
		}
	}
?>
