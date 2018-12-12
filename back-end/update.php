<?php 
include "../database/conn.php";
session_start();
// Escape all $_POST variables to protect against SQL injections
$checkin = $mysqli->escape_string($_POST['checkin']);
$checkout = $mysqli->escape_string($_POST['checkout']);
$rooms = $mysqli->escape_string($_POST['rooms']);
$beds = $mysqli->escape_string($_POST['beds']);
$price = $mysqli->escape_string($_POST['price']);
$id=$mysqli->escape_string($_POST['id']);
$id=$mysqli->escape_string($_POST['id']);

echo $id;
$result = $mysqli->query("SELECT * FROM rooms WHERE rooms='$rooms' AND bed='$beds' AND active=0 LIMIT 1");
$user = $result->fetch_assoc();


$roomno = $user['roomno'];
if ($oldroomno == $roomno) {

 $sql="UPDATE reservations
   SET checkin='$checkin',checkout='$checkout',rooms='$rooms',beds='$beds',price='$price',roomno='$roomno'
 WHERE id = '$id'";
if ($mysqli->query($sql) === TRUE) {
    
    $_SESSION['message'] = 'reservations made';
  header("location: ../front-end/history.php");

} else {
    echo "reservations not made".$mysqli->error;
}

}
else if ($roomno!="" && $user['active'] == 0 ) {
	# code...
	$sql = "UPDATE rooms SET active=1 WHERE roomno='$roomno'";
	if ($mysqli->query($sql) === TRUE) {

 $sql="UPDATE reservations
   SET checkin='$checkin',checkout='$checkout',rooms='$rooms',beds='$beds',price='$price',roomno='$roomno'
 WHERE id = '$id'";
if ($mysqli->query($sql) === TRUE) {
    
    $_SESSION['message'] = 'reservations made';
  header("location: ../front-end/history.php");

} else {
    echo "reservations not made".$mysqli->error;
}
}
 
}
else {
      $_SESSION['message'] = 'Room Not Found Please Choose Another';
   header("location: ../front-end/profile.php");
      
}

 ?>