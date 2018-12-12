<?php 
session_start();
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
	background-image: url(../images/bg3.jpg);
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
      <li><a href="../index.php">Home</a></li>
      <li><a href="login.php">log in</a></li>
      <li><a href="signup.php">sign up</a></li>
      <li><a href="contact.php">contact us</a></li>
    </ul>
  </nav>

<div class="form">
	  <form action="../back-end/signupend.php" method="post" class="form-style"> 
    <h1 class="fs-title">sign up</h1>
    <span class="fs-subtitle">A promise of premium</span>

    <br>
    <br>
    <ul>
    	  <li>  
              <input type="text" name="fname" placeholder="full names" required="\">
        </li>
          <li>  
              <input type="text" name="email" placeholder="email" required="\">
        </li>

         <li>  
              <select name="gender">
              	<option>Gender</option>
              	<option value="male">Male</option>
              	<option value="female">Female</option>
              	
              </select>
        </li>
        <li>
              <input type="password" name="password" placeholder="Password" required="">
          </li>

             <p class="message"><?php if (isset($_SESSION['message'])) {
          # code...
          echo $_SESSION['message'];
         } ?></p>
          
          <input type="submit" name="submit" value="signup">
    </ul>
  
  </form>
</div>
</div>
</body>
</html>