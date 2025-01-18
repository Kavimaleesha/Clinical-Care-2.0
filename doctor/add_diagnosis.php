<!-- function of admin -->
<?php include('function.php');



if (isset($_GET['add_diagnosis'])) {
    $p_id = $_GET['add_diagnosis'];
}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Add Diagnosis</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
    
	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Add Diagnosis</label>
	      <ul>
	        <li><a class="active"  href="doctor_home.php">HOME</a></li>
	        
	        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
            
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

    <h1>Add Diagnosis</h1>

    <form action="doctor_home.php" method="post" id="frm">

        <div class="errormessege">
            <?php include('../errors.php') ?>
        </div>

        <input type="hidden" name="staff_id" value="<?php echo $_SESSION['user']['staff_id']; ?>">
        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
    
        <label>Date</label><br><br>
        <input type="text" name="diagnosis_date" readonly value="<?php echo( date("Y/m/d")) ?>" id="name"><br><br>

        <label>Diagnosis</label><br><br>
        <textarea id="test" name="diagnosis" required="Enter Diagnosis"></textarea><br><br>
    

        <input type="submit" name="add_medicine" value="Add Diagnosis" id="booking">
    </form>

</div><br><br><br>

<div id="s">
    <h1> Old Diagnosis </h1>
<table id="allusers" class="table table-striped table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>Diagnosis</th>
                <th id="a">Diagnosis Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody> 
            <?php
            $result_E=mysqli_query($db,"SELECT * from diagnosis WHERE p_id=$p_id");
            while ($row=mysqli_fetch_array($result_E)) {?>
            <tr>
                <td><?php echo $row['diagnosis']; ?></td>
                <td id="a"><?php echo $row['diagnosis_date']; ?></td> <!-- a refer as text align -->

                <td align="center">
                    <a href="edit_diagnosis.php?edit_diagnosis=<?php echo $row['diagnosis_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i> Edit </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                    <a href="add_diagnosis.php?delete_diagnosis=<?php echo $row['diagnosis_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to Delete the diagnosis?')">Delete</a>
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
