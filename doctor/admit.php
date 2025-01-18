<!-- function of admin -->
<?php include('function.php');

if (!isDoctor()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

// Admit *******************************************************************************************

if (isset($_GET['admit'])) {
    $p_id = $_GET['admit'];
    $admitdischarge = "Admit";
  }

 if (isset($_GET['discharge'])) {
    $p_id = $_GET['discharge'];
    $admitdischarge = "Discharge";
  }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Admit</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
    
	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| Admit</label>
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
  


  			<?php if ($admitdischarge=="Admit"): ?>
        		<h1 style="color: gray; font-style: italic; font-family: times new roman">Admit</h1>
      		<?php else: ?>
        		<h1 style="color: gray; font-style: italic; font-family: times new roman">Discharge</h1>
      		<?php endif ?>

    <div class="container" style="margin-bottom: 50px;">
    	<form action="admit.php" method="post" id="frm">

        	<input type="hidden" name="staff_id" value="<?php echo $_SESSION['user']['staff_id']; ?>">
        	<input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
        	<input type="hidden" name="admitdischarge" value="<?php echo $admitdischarge; ?>">

        	<label>Date</label><br><br>
        	<input type="text" id="name" name="admitdischarge_date" readonly value="<?php echo( date("Y/m/d")) ?>"><br><br><br>

       		<label>Comment</label><br><br>
        	<input type="text" id="name" name="comment" required="Enter comment"><br><br><br>

    	<?php if ($admitdischarge=="Admit"): ?>
    		<label>Ward Id</label><br><br>
        	<input type="number" id="name" name="w_id" required="Enter ward Id"><br><br><br>
    	<?php else: ?>
        	<input type="hidden" id="name" name="w_id" value="0">
    	<?php endif ?>

    	<?php if ($admitdischarge=="Admit"): ?>
         	<button type="submit" id="booking" name="admit_patient">Admit</button>
      	<?php else: ?>
         	<button type="submit" id="booking" name="discharge_patient">Discharge</button>
      	<?php endif ?>
      </form>
     </div>
    	

    <!-- ****************************************************************************************************** -->

    
        
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
