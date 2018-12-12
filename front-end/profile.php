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
  
<form method="post" action="../back-end/book.php" class="form-style">
  <table>

    <tr>
      <td style="text-transform: uppercase; font-weight: bold;">Reservation form</td>
    </tr>
    <tr>
      <td></td>
      <td>check in<li><input type="date" name="checkin" required=""></li></td>
     <td>check out<li><input type="date" name="checkout" required=""></li></td>
    </tr>
    <tr>
      <td></td>
      <td>  <li>  
              <select name="rooms" onchange="pricing()" id="rooms" required="">
                <option>Rooms</option>
                <option value="1">1 Room</option>
                <option value="2">2 Rooms</option>
                 <option value="3">3 Rooms</option>
                  <option value="4">4 Rooms</option>
                
              </select>
        </li></td>
      <td><li>  
              <select name="beds" onchange="pricing()" id="beds" required="">
                <option>Bed/s</option>
                <option value="1">1 Bed</option>
                <option value="2">2 Beds</option>      
              </select>
        </li></td>
    </tr>
    <tr>
      <td></td>
        <td></td>

        <td>
          <p style="color: white; font-weight: bold;" id="dprice">$</p>
        </td>
    </tr>
    <tr>
         <input type="hidden" name="price" id="priced">
    </tr>





  </table>
    <p class="message"><?php if (isset($_SESSION['message'])) {
          # code...
          echo $_SESSION['message'];
         } ?></p>
  <div class="submitin">
      <input type="submit" value="book" name="submit">
  </div>


</form>
</div>

<script type="text/javascript">
  function pricing() {
    // body...
    var rooms = document.getElementById("rooms").value;
     var beds =  document.getElementById("beds").value;

     var price  = (20*rooms)+(5*beds);
     document.getElementById("dprice").innerHTML = "$"+price;
     document.getElementById("priced").value =price;
     document.getElementById("drooms").value =rooms;
     document.getElementById("dbeds").value =beds;
    console.log(price);



    
  }
</script>


</body>
</html>