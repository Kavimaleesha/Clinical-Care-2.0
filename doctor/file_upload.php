<!-- function of admin -->
<?php include('function.php'); 

if (!isDoctor()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

    $file_name     ='';
    $p_id       ='';
    $file_size   ='';
   
if (isset($_GET['file_upload'])) {
      $p_id = $_GET['file_upload'];

$rec = "SELECT * FROM file  WHERE p_id='$p_id'";
$resultK = mysqli_query($db, $rec);
$files = mysqli_fetch_all($resultK, MYSQLI_ASSOC);
}     


?>

<!DOCTYPE html>
<html>
<head>

	<title>File Upload</title>

	<link rel="stylesheet" type="text/css" href="/pis/css/receptionist/receptionist_home.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">

	<?php include('link_css.php'); ?>
	<?php include('link_js.php'); ?>

</head>
<body>

	<nav>

	    <label id="title">| File Upload</label>
	      <ul>
	        <li><a href="doctor_home.php">HOME</a></li>
	        
	        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">logout</a></li>
            
	        <li>
                <!-- logged in user information -->

            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>

                <small>
                    <i  style="color: cyan;">(<?php echo($_SESSION['user']['user_name']); ?>)</i> 
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
    			<th>File Id</th>
    			<th>File Name</th>
    			<th>Size (in MB)</th>
                <th>Action</th>
    		</tr>
    	</thead>

    	<tbody> 
            <?php foreach ($files as $file): ?>
            <tr>
                <td id="a"><?php echo $file['file_id']; ?></td>
                <td id="a"><?php echo $file['file_name']; ?></td>
                <td id="a"><?php echo floor($file['file_size'] / 1000) .'KB'; ?></td>

                <td align="center">
                    <a href="file_upload.php?view_files=<?php echo $file['file_id']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i> View </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </td>
            </tr>
            <?php endforeach;?>

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
