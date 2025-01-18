<!-- function of admin -->
<?php include('function.php'); 

if (!isDoctor()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Doctor Home</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/doctor/doctor_home.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

    <!-- data table (search, show entries etc..) -->
    <script>
    $(document).ready(function() {
    $('#allusers').DataTable();
    } );
    </script>


</head>
<body>

	<nav>

	    <label id="title">| Doctor Home</label>
	      <ul>
	        <li><a class="active"  href="doctor_home.php">Home</a></li>
            <li><a href="view_appoinments.php">View Appoinments</a></li>
	        
	        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">Logout</a></li>
            
	        <li>
                <!-- logged in user information -->

            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['fname']); ?>)</i> 
                    <img src="/pis/images/21.png" class="profile_info">
                 </small>

            <?php endif ?>
        </li>

      </ul>
    </nav><br><br><br><br>

    <!-- <h6 id="head" style="color: white;">Doctor Home</h6> -->

    <?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>
    
    <div id="s"> <!-- white div -->
    <table id="allusers" class="table table-striped table-bordered" style="width: 100%">
    	<thead>
    		<tr>
    			<th>Patient Name</th>
    			<th id="a">ID Number</th>
    			<th id="a">Email</th>
    			
    			<th colspan="2"id="a">Diagnosis</th>
                <th colspan="2" id="a">Checkup</th>
                <th colspan="2" id="a">Edit</th>
    		</tr>
    	</thead>

    	<tbody> 
    		<?php
            $result_D=mysqli_query($db,"SELECT * from patient");
             // t1 INNER JOIN ward t2 ON t1.p_id = t2.p_id;
            while ($row = mysqli_fetch_array($result_D)) { ?>
    		<tr>
    			<td style="text-align: left;"><?php echo $row['fname']," ", $row['lname']; ?></td> <!-- a refer as text align -->
    			<td id="a"><?php echo $row['id_number']; ?></td>
    			<td id="a"><?php echo $row['email']; ?></td>
    			

                <td align="center">
                    <a href="add_diagnosis.php?add_diagnosis=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i>Add Diagnosis</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td align="center">
                    <a href="view_diagnosis.php?view_diagnosis=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i>View Diagnosis</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>

    			<td align="center">
                    <a href="add_checkup.php?add_checkup=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i>Add Checkup</a>
                </td>  

                <td align="center">
                    <a href="view_checkup.php?view_checkup=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i>View Checkup</a>
                </td>  

                <td>
                <a href="edit.php?edit_p=<?php echo $row['p_id']; ?>" class="btn btn-info btn-sm" ><i class="fas fa-eye"></i> Edit </a>
                </td>

    		</tr>
    		<?php } ?>
    	</tbody>	
    </table>
   </div>

    
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
