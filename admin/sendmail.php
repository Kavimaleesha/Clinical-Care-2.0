<?php include('functions.php');
 
 
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Appoinments</title>
    <link rel="stylesheet" type="text/css" href="/pis/css/booking.css">
    <link rel="stylesheet" type="text/css" href="/pis/css/all.css">
 
    <?php include('link_css.php'); ?>
    <?php include('link_js.php'); ?>
 
 
 
</head>
<body>
 
    <nav>
    <label id="title">| Send Mail</label>
      <ul>
        <li><a href="admin_home.php">Home</a></li>
        <li><a href="/pis/index.php?logout='1' "style="font-size:14px;" id="logout">Logout</a></li>
        <li>
        <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['user_type']; ?></strong>
 
                <small>
                    <i  style="color: cyan;">(<?php echo ucfirst($_SESSION['user']['user_name']); ?>)</i>
                    <img src="/pis/images/18.png" class="profile_info">
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
 
    <?php
    //$query = ("SELECT  * FROM booking ");
    $query = ("SELECT   p.p_id,    p.fname, p.lname,  p.email, b.booking_id, b.doctor,    b.booking_date,   b.approval_time, b.approval  FROM    patient p JOIN   booking b ON p.p_id = b.p_id LEFT JOIN   scheduleclinic s ON b.doctor = s.clinicname  WHERE b.approval= '1' ORDER BY
    STR_TO_DATE(b.booking_date, '%Y-%m-%d') DESC,
    STR_TO_DATE(b.approval_time, '%H:%i:%s') DESC ");
        $results_set = mysqli_query($db, $query);
?>
 
<div class="container">
 
    <h1>Send Mail</h1><br><br>
 
    <div id="s"> <!-- purple div -->
    <table id="alluser" class="table table-striped table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th id="p_id">Patient ID</th>
                <th id="">Current time</th>
                <th id="p_id">Booking ID</th>
                <th id="patientname">Patient Name</th>
                <th id="email">Email</th>
                <th id="clinicname">Clinic Name</th>
                <th id="date">Date</th>
                <th id="time">Time</th>
                <th id="time">Approval</th>
                <th id="approval">Send Mail</th>
               
                   
            </tr>
        </thead>
 
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_set)) { ?>
            <tr>
                <td id ="p_id"><?php echo $row['p_id']; ?></td>
                <td id ="time"><?php echo $current_timestamp; ?></td>
                <td id ="booking_id"><?php echo $row['booking_id']; ?></td>
                <td id ="fname"><?php echo $row['fname']; ?>  <?php echo $row['lname']; ?></td>
                <td id ="email"><?php echo $row['email']; ?></td>
                <td id ="clinicname"><?php echo $row['doctor']; ?></td>
                <td id="date"><?php echo $row['booking_date']; ?></td>
                <td id="time"><?php echo $row['approval_time']; ?></td>
                <td id="approval"><?php echo $row['approval']; ?></td>
                <td id ="edit">
                <form action="" method="post">
                    <input type= "submit" value= "send_mail " name = "send_mail">
                </form>
                </td>
               
 
               
 
            </tr>
            <?php } ?>
        </tbody>    
    </table>
   </div>
     
     
 
     
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