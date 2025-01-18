<!-- common function -->
<?php include('../functions.php');
   
    date_default_timezone_set('Asia/Colombo');
    $current_timestamp = date('H:i:s');
    // Add users................................................................................
    if (isset($_POST['add_user'])) {
 
    // receive all input values from the form
        $user_name    = ($_POST['user_name']);
        $email       = ($_POST['email']);
        $password_1  = ($_POST['password_1']);
        $password_2  = ($_POST['password_2']);
        $user_type = ($_POST['user_type']);
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
 
       
 
        // form validation: ensure that the form is correctly filled
        if (empty($user_name)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
       
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
 
        if (empty($user_type)) {
            array_push($errors, "User Type is required");
        }
 
        if (empty($fname)) {
            array_push($errors, "First Name is required");
        }
 
        if (empty($lname)) {
            array_push($errors, "Last Name is required");
        }
 
        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
 
                $query = "INSERT INTO staff (`fname`, `lname`, `user_type`, `user_name`, `email`, `password`)
                          VALUES('$fname','$lname','$user_type','$user_name','$email','$password')";
                mysqli_query($db, $query);
                $_SESSION['message']  = "New user successfully created!!";
                header('location: /pis/admin/user_list.php');
            }else{
                        array_push($errors, "Connection errors !");    
            }
 
        }
   
    // *************************************************************************************
 
    // Insert data table from database
 
    $query = "SELECT staff_id,fname,lname,user_type,user_name,email FROM staff";
    $result_set = mysqli_query($db, $query);
 
   
 
       
    // // *********************************************************************************
 
    //Delete Records
 
      if (isset($_GET['del'])) {
      $staff_id = $_GET['del'];
      mysqli_query($db, "DELETE FROM staff WHERE staff_id ='$staff_id'");
     
      $_SESSION['message'] = "Address deleted!";
      header('location: user_list.php');
 
    }
 
    // // *********************************************************************************
 
    //Update Records
 
     if (isset($_POST['update'])) {
 
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $user_name = $_POST['user_name'];
      $email = $_POST['email'];
      $user_type = $_POST['user_type'];
      $staff_id = $_POST['staff_id'];
 
      mysqli_query($db, "UPDATE staff SET fname='$fname',lname='$lname',user_name='$user_name',email='$email',user_type='$user_type' WHERE staff_id='$staff_id'");
 
      $_SESSION['message'] = "Data is updated!";
      header('location: user_list.php');
 
     }
 
    // // *********************************************************************************
 
    //Reset password
 
    if (isset($_POST['reset'])) {
 
      $staff_id = $_POST['staff_id'];
      $password_1  =  $_POST['password_1'];
      $password_2  =  $_POST['password_2'];
 
   
    if (empty($password_1)) {
      array_push($errors, "Password is required");
    }
 
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
   
    // register user if there are no errors in the form
    if (count($errors) == 0) {
       $password = md5($password_1);
     
 
    mysqli_query($db, "UPDATE staff SET password='$password' WHERE staff_id='$staff_id'");
 
    array_push($errors, "Password reset Successfully!!");
    header('location: user_list.php');
 
    }
  }
 
 
 
 
   //send mail
   if (isset($_POST['send_mail'])) {
    // Get the current timestamp using the time() function
    date_default_timezone_set('Asia/Colombo');
    $current_timestamp = date('H:i:s');
 
    // Format the current timestamp as a date and time string
    //$current_time = date('Y-m-d H:i:s', $current_timestamp);
 
    // Assuming you get the approval_time from the form
    // $approval_time_str = $_POST['approval_time'];
 
    // // Create a DateTime object for the current time
    // $current_datetime = new DateTime($current_time);
 
    // // Create a DateTime object for the approval time
    // $approval_datetime = DateTime::createFromFormat('H:i:s', $approval_time_str);
 
    // // Subtract 12 hours from the approval time
    // $notification_time = clone $approval_datetime;
    // $notification_time->sub(new DateInterval('PT12H'));
 
    $sqlQ= "SELECT booking.*, patient.email, patient.fname, patient.lname
    FROM booking
    JOIN patient ON booking.p_id = patient.p_id
    WHERE booking.p_id = 27";
 
 
// Compare the current time with the notification time
 
    // Send notification as it's 12 hours before the approval time
    // Your notification code here
    $stmt = mysqli_stmt_init($db);
   
 
    if(!mysqli_stmt_prepare($stmt,$sqlQ)){
        $errorM = "SQL Statement Failed!";
    }else{
        $run = mysqli_stmt_execute($stmt);
        $rslt = mysqli_stmt_get_result($stmt);
        $email;
        $fname;
        $lname;
        $doctor;
        $booking_date;
        $approval_time;
 
        while($row = mysqli_fetch_assoc($rslt)){
            $email = $row['email'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $doctor = $row['doctor'];
            $booking_date = $row['booking_date'];
            $approval_time = $row['approval_time'];
            echo $email;
        }
 
        $to = $email;
        $sub =  "Upcoming appoinment for ". $doctor;
        $msg = "Dear " .$fname." ".$lname. ",\r\n\r\nYou have an upcoming appoinment for"." " . $doctor." "."on ".$booking_date . " ". "at". $approval_time. "\r\n\r\n Please be on time for your appoinment\r\n"."\r\n\r\n .If you did not register on Clinical Care or have any concerns about your account, please contact our support team at entwicklerst@gmail.com.\r\n\r\nThank you for choosing Clinical Care. We're here to support you to reduce .\r\n\r\nBest regards,\r\nAdmin Clinical Care\r\nClinical Care Team\r\n";
 
        $header = "From : Clinical Care";
 
        if($run == TRUE){
 
        if(mail($to, $sub, $msg, $header)){
            $emailM = "Check Your Email!";
            echo $emailM;
        }
        else{
            $emailM = "Enter valid Email";
            echo $emailM;
        }
   
   
 
 
   
    $_SESSION['message'] = "Data is updated!";
    //header('location: admin_home.php');
 
}
}
   }
 
 
// ***************************************************************************************************************
?>