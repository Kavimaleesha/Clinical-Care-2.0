<!-- function of admin -->
<?php include('function.php');

if (!isDoctor()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

if (isset($_GET['view_checkup'])) {
    $p_id = $_GET['view_checkup'];
  }


?>

<!DOCTYPE html>
<html>
<head>

	<title>Add Checkup</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
    
	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| View Checkup</label>
	      <ul>
	        <li><a class="active"  href="doctor_home.php">HOME</a></li>
	        
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
    
   

<div id="s">
    <h1> Previous Checkups </h1>
<table id="allusers" class="table table-striped table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>Checkup</th>
                <th>Doctor Comment</th>
                <th id="a">Checkup date</th>
                
                <th>Action</th>
            </tr>
        </thead>

        <tbody> 
            <?php if (isset($_GET['view_checkup'])) {
            $result_E=mysqli_query($db,"SELECT * from checkup WHERE p_id=$p_id");
            while ($row=mysqli_fetch_array($result_E)) {?>
            <tr>
                <td><?php echo $row['checkup_name']; ?></td>
                <td><?php echo $row['doctor_comment']; ?></td>
                <td id="a"><?php echo $row['checkup_date']; ?></td> <!-- a refer as text align -->
                

                <td align="center">
                    <a href="edit_checkup.php?edit_checkup=<?php echo $row['checkup_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i> Edit </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                    <a href="add_checkup.php?delete_checkup=<?php echo $row['checkup_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to Delete the Checkup?')">Delete</a>
                </td>


            </tr>
            <?php }} ?>
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
