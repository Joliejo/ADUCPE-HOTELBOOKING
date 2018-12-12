<?php
/* Password reset process, updates database with new user password */
include "../database/conn.php";
session_start();
    // Makes it easier to read
    $email = $_SESSION['email'];
    $accountid = $_SESSION['accountid'];
    $fname = $_SESSION['fname'];

// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
       
        $account_id=uniqid(true);
        
        $sql = "UPDATE accounts SET password='$new_password', accountid='$account_id' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Your password has been reset successfully!";
       session_unset();
session_destroy(); 
header("location: ../front-end/login.php"); 

        }

    }
    else {
        $_SESSION['message'] = "Two passwords you entered don't match, try again!";
       header( "location: ../fron-end/change.php" );     
    }

}
?>