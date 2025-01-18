<!-- function of admin -->
<?php include('function.php');

if (!isDoctor()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

    $staff_id = '';
    $p_id = '';
    $fname = '';
    $lname ='';
    $id_number= '';
    $email= '';
   
    

if (isset($_GET['edit_p'])) {
    $p_id=$_GET['edit_p'];

    $record_C=mysqli_query($db,"SELECT * FROM patient WHERE p_id='$p_id'");

    $record=mysqli_fetch_array($record_C);
    //$staff_id = $record['staff_id'];
    $p_id = $record['p_id'];
    $fname = $record['fname'];
    $lname =$record['lname'];
    $id_number= $record['id_number'];
    $email = $record['email'];
    
  }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Edit</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
    
	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Edit</label>
	      <ul>
	        <li><a class="active"  href="doctor_home.php">Home</a></li>
	        
	        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">Logout</a></li>
            
	        <li>
                <!-- logged in user information -->

            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['user_name']); ?>)</i> 
                    <img src="/pis/images/21.png" class="profile_info">
                 </small>

            <?php endif ?>
        </li>

      </ul>
    </nav><br><br><br><br>
    
    <div class="container">

    <h1>Edit</h1>

    <form action="doctor_home.php" method="post" id="frm">

        
        <input type="hidden" name="staff_id" value="<?php echo $_SESSION['user']['staff_id']; ?>">
        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">

        <label>Patient's First Name :</label><br><br>
        <input type="text" id="fname" name="fname" value="<?php echo $fname;?> "><br><br><br>

        <label>Patient's Last Name :</label><br><br>
        <input type="text" id="lname" name="lname" value="<?php echo $lname;?> "><br><br><br>

        <label>ID Number :</label><br><br>
        <input type="text" id="id_number" name="id_number" value="<?php echo $id_number;?> "><br><br><br>

        <label>Email :</label><br><br>
        <input type="text" id="email" name="email" value="<?php echo $email;?> "><br><br><br>
        <br><br><br>

        <button type="submit" class="btn btn-info" name="edit_p">Update Patient</button>
    </form>
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
