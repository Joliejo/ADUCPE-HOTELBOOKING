<?php 
session_start();
include "../database/conn.php";
  // Makes it easier to read
    $email = $_SESSION['email'];
    $accountid = $_SESSION['accountid'];
    $fname = $_SESSION['fname'];
$sql = "SELECT * FROM reservations WHERE email='$email' ORDER BY idno DESC LIMIT 5";
$result = $mysqli->query($sql);



$sql2 = "SELECT * FROM reservations WHERE email='$email' ORDER BY idno DESC LIMIT 5";
$result2 = $mysqli->query($sql2);

if (isset($_GET['id'])) {
   # code...
  $id=$_GET['id'];
 $roomno=$_GET['roomno'];
$delete="DELETE FROM reservations WHERE id='".$id."'";
if ($mysqli->query($delete)===true) {
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");

  $sql = "UPDATE rooms SET active=0 WHERE roomno='$roomno'";
  if ($mysqli->query($sql) === TRUE) {
  }
  ?>
  <script type="text/javascript">
    alert('deleting success');
  </script>
  <?php
    header("location: history.php");
}
else{
   ?>
  <script type="text/javascript">
    alert('deleting failed <pp ');
  </script>
  <?php
}
 }
 ?>



<?php 
include "../database/conn.php";

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
 header( "location: ../index.php" );
}
else {
    // Makes it easier to read
    $email = $_SESSION['email'];
    $accountid = $_SESSION['accountid'];
    $fname = $_SESSION['fname'];
   
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>jistory</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <title></title><link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<body>
 
  <div class="limiter">
  <nav>
    
    <ul>
      <li><a href="profile.php">Home</a></li>
      <li><a href="profile.php">book</a></li>
      <li><a href="history.php">history</a></li>
      <li><a href="change.php">change password</a></li>
      <li><a href="../back-end/logout.php">logout</a></li>
    </ul>
  </nav>
    <div class="container-table100" style="margin-top: -40px">
      <div class="wrap-table100">
        <div class="table100 ver1">
          <div class="table100-firstcol">
            <table>
              <thead>
                <tr class="row100 head">
                  <th class="cell100 column1">price</th>
                </tr>
              </thead>
              <tbody>
                        <?php 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
 ?>
                <tr class="row100 body">
                  <th class="cell100 column1" style="color: blue"><p style="margin-top: -8px"><?php  echo $row["price"]?></p></th>
                </tr>

  
<?php 
}
} else {

}
 ?> 

                
              </tbody>
            </table>
          </div>
          
          <div class="wrap-table100-nextcols js-pscroll">
            <div class="table100-nextcols">
              <table>
                <thead>


                  <tr class="row100 head">
                     <th class="cell100 column2">Room no</th>
                    <th class="cell100 column2">cancle</th>
                      <th class="cell100 column2">update</th>
                    <th class="cell100 column3">check in</th>
                    <th class="cell100 column4">check out</th>
                    <th class="cell100 column5">rooms</th>
                    <th class="cell100 column6">beds</th>

                  </tr>
                </thead>
                <tbody>
                                                        <?php 
if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
 ?>
                  <tr class="row100 body">
                      <td class="cell100 column3" ><?php  echo $row["roomno"]?></td>
                    <td class="cell100 column2"><a href="history.php?id=<?php echo $row['id'];?>&roomno=<?php echo $row['roomno'];?> " style="color: red">cancle</a></td>
                    <td class="cell100 column2"><a href="update.php?id=<?php echo $row['id'] ;  ?>&roomno=<?php echo $row['roomno'];?>  ">upload</a></td>
                    <td class="cell100 column3"><?php  echo $row["checkin"]?></td>
                    <td class="cell100 column4"><?php  echo $row["checkout"]?></td>
                    <td class="cell100 column5"><?php  echo $row["rooms"]?></td>
                    <td class="cell100 column6"><?php  echo $row["beds"]?></td>
          
                  </tr>

<?php 
}
} else {

}
 ?> 

              


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<!--===============================================================================================-->  
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
    $('.js-pscroll').each(function(){
      var ps = new PerfectScrollbar(this);

      $(window).on('resize', function(){
        ps.update();
      })

      $(this).on('ps-x-reach-start', function(){
        $(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
      });

      $(this).on('ps-scroll-x', function(){
        $(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
      });

    });

    
    
    
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>