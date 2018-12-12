<?php
session_start();
session_unset();
session_destroy(); 

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// drop

$sql = "DROP DATABASE IF EXISTS hotel";
if (mysqli_query($conn, $sql)) {
    echo "Database hotel was successfully dropped\n";
} else {
    echo 'Error dropping database: ' . mysql_error() . "\n";
}





// Create database
$sql = "CREATE DATABASE IF NOT EXISTS  hotel";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


mysqli_select_db($conn,"hotel");






// sql to create table
$createaccounts = "CREATE TABLE accounts (

id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,         
accountid varchar(100) NOT NULL,              
fullname  varchar(100) NOT NULL,              
email varchar(100) NOT NULL,              
gender varchar(100) NOT NULL,             
password varchar(100) NOT NULL,               
date varchar(100) NOT NULL
)";





if ($conn->query($createaccounts) === TRUE) {
    echo "Table MyGuests created successfully";


$password = $conn->escape_string(password_hash("password100", PASSWORD_BCRYPT));

    $sql = "INSERT INTO `accounts`(`accountid`, `fullname`, `email`, `gender`, `password`, `date`) VALUES ('15c0fe9864415c','example name','example@gmail.com','male','$password','Tuesday, December 11, 2018')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$createreservations = "CREATE TABLE reservations (
idno INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                 
id   varchar(200) NOT NULL,           
fname varchar(200) NOT NULL,              
roomno varchar(200) NOT NULL,             
checkin varchar(200) NOT NULL,                
checkout varchar(200) NOT NULL,               
rooms   INT(11) NOT NULL,            
beds   INT(11) NOT NULL,
price   INT(11) NOT NULL,              
email varchar(200) NOT NULL
)";

if ($conn->query($createreservations) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$createrooms = "CREATE TABLE rooms (
id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,            
roomno  int(11) NOT NULL,             
rooms   int(11) NOT NULL,              
bed int(11) NOT NULL,             
active  int(11) NOT NULL 
)";

if ($conn->query($createrooms) === TRUE) {
    echo "Table MyGuests created successfully";

    $sql1 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (200,1,1,0)";
     $sql2 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (202,2,1,0)";
      $sql3 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (203,3,1,0)";
       $sql4 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (204,4,1,0)";

    $sql5 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (300,1,2,0)";
     $sql6 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (302,2,2,0)";
      $sql7 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (303,3,2,0)";
       $sql8 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (304,4,2,0)";

           $sql9 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (400,1,1,0)";
     $sql10 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (402,2,1,0)";
      $sql11 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (403,3,1,0)";
       $sql12 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (404,4,1,0)";

    $sql13 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (500,1,2,0)";
     $sql14 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (502,2,2,0)";
      $sql15 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (503,3,2,0)";
       $sql16 = "INSERT INTO `rooms`( `roomno`, `rooms`, `bed`, `active`) VALUES (504,4,2,0)";




if ($conn->query($sql1) === TRUE) {
    if ( $conn->query($sql2) === TRUE ) {
        if ($conn->query($sql3) === TRUE ) {
            if ( $conn->query($sql4) === TRUE ) {
                if ($conn->query($sql5) === TRUE ) {
                    if ($conn->query($sql6) === TRUE ) {
                        if ($conn->query($sql7) === TRUE ) {
                            if ($conn->query($sql8) === TRUE) {
                                # code...
                            }
                            # code...
                        }
                        # code...
                    }
                    # code...
                }
                # code...
            }
            # code...
        }
        # code...
    }
    echo "New record created successfully";
} 


if ($conn->query($sql9) === TRUE) {
    if ( $conn->query($sql10) === TRUE ) {
        if ($conn->query($sql11) === TRUE ) {
            if ( $conn->query($sql12) === TRUE ) {
                if ($conn->query($sql13) === TRUE ) {
                    if ($conn->query($sql14) === TRUE ) {
                        if ($conn->query($sql15) === TRUE ) {
                            if ($conn->query($sql16) === TRUE) {
                                # code...
                            }
                            # code...
                        }
                        # code...
                    }
                    # code...
                }
                # code...
            }
            # code...
        }
        # code...
    }
    echo "New record created successfully";
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
    echo "Error creating table: " . $conn->error;
}




$conn->close();
?>