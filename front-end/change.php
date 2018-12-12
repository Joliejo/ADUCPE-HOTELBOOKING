<?php 
include "../database/conn.php";
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
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
<html>
<head>
  <title></title><link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/forms.css">
</head>
<style type="text/css">
  body{
  background-color: blue;
  background-image: url(../images/bg5.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  font-family: 'Trebuchet MS', sans-serif;
  width: 100%;
  overflow: hidden;
}
</style>
<body>
<div class="wrap">
  <nav>
    
    <ul>
      <li><a href="profile.php">Home</a></li>
      <li><a href="profile.php">book</a></li>
      <li><a href="history.php">history</a></li>
      <li><a href="change.php">change password</a></li>
      <li><a href="../back-end/logout.php">logout</a></li>
    </ul>
  </nav>


  </div>


  </div>
  <div class="form">
    <form action="../back-end/reset.php" method="post" class="form-style" autocomplete="off"> 
    <h1 class="fs-title">change password</h1>
    <span class="fs-subtitle">A promise of premium</span>

    <br>
    <br>
    <ul>
      <li>  
              <input type="password" name="oldpassword" placeholder="current password" required="\">
        </li>
          <li>  
              <input type="password" name="newpassword" placeholder="new password" required="\">
        </li>
        <li>
              <input type="password" name="confirmpassword" placeholder="confirm Password" required="">
          </li>

     <p class="message"><?php if (isset($_SESSION['message'])) {
          # code...
          echo $_SESSION['message'];
         } ?></p>
          
          <input type="submit" name="submit" value="change">
    </ul>
  
  </form>
</div>
</div>
</body>
</html>