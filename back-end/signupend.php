<?php 
include "../database/conn.php";
session_start();
// Escape all $_POST variables to protect against SQL injections
$fname = $mysqli->escape_string($_POST['fname']);
$gender = $mysqli->escape_string($_POST['gender']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$account_id=uniqid(true);
$mydate=getdate(date("U"));
$date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";



// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {

    $_SESSION['message'] = 'User with this email already exists!';
   header("location: ../front-end/signup.php");

}
else{
	$sql = "INSERT INTO accounts (fullname, email, gender,date, password, accountid)
VALUES ('$fname', '$email', '$gender','$date','$password','$account_id')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");
$user = $result->fetch_assoc();
    $_SESSION['email'] = $user['email'];
        $_SESSION['accountid'] = $user['accountid'];
        $_SESSION['fname'] = $user['fullname'];
             $_SESSION['logged_in'] = true;

    header("location: ../front-end/profile.php");
} else {
    $_SESSION['message'] = 'Sorry something is wrong try again';
   header("location: ../front-end/signup.php");
}
}


 ?>