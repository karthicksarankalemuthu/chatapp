<?php

$con=mysqli_connect("localhost","root","","chat");
 if($con){
  echo"database connection successfully";
 }
 else{
     echo"connection failed";
 }
?>