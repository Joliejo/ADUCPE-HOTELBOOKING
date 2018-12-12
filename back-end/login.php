<?php 
   session_start();

include "../database/conn.php";
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM accounts WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
       header("location: ../front-end/login.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

    $_SESSION['message'] = "welcome";
        session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['accountid'] = $user['accountid'];
        $_SESSION['fname'] = $user['fullname'];
        $_SESSION['logged_in'] = true;


       header("location: ../front-end/profile.php");

     
     
    }
    else {
      $_SESSION['message'] = "You have entered wrong password, try again!";
       header("location: ../front-end/login.php");
      
    }
}


 ?>