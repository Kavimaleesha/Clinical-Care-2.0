<?php include('functions.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking</title>
	<link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
	<link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>



	
</head>
<body>

	<nav>
    <label id="title">| Clinical Care</label>
      <ul>
      	<li><a href="booking.php">Home</a></li>
		<li><a href="view_clinics.php">View Clinics</a></li>
		<li><a href="view_clinics.php">Notifications</a></li>
        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">Logout</a></li>
        <li>
				<!-- logged in user information -->

     		<?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']="Patient"; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['fname']); ?>)</i> 
                    <img src="/pis/images/17.png" class="profile_info">
                 </small>

            <?php endif ?>
 		</li>

      </ul>
    </nav>

<?php if (isset($_SESSION['message'])):?>
    	<div class="msg">
    	<?php
    		echo $_SESSION['message'];
    		unset($_SESSION['message']);
    	?>	
    	</div>
    <?php endif ?>

<div class="container">

	
</div><br><br><br>

<div id="s">
<table class="table table-striped table-bordered" style="width: 100%">
    	<thead>
    		<tr>
    			<th>Notifications</th>
    			
    		</tr>
    	</thead>

    	<tbody> 
    		<?php 
			//P_id - Notifications
            $p_id = $_SESSION['user']['p_id'];
            $result_B = mysqli_query($db,"SELECT * FROM `notification` WHERE p_id IS NULL OR p_id = $p_id ORDER BY recipient_id DESC");
            while ($row = mysqli_fetch_array($result_B)) { ?> 
    		<tr>
    			<td><?php echo $row['message']; ?></td>
    			
    		</tr>
    		<?php } ?>
    	</tbody>	
    </table>
</div>

 

</body>
</html>