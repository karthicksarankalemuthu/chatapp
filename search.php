<?php
session_start();
require_once "config.php";
 $q=$_GET["q"];
$sql="SELECT * FROM users WHERE name LIKE '{$q}%' AND status='active now' AND NOT unique_id='$q'";
$res=mysqli_query($con,$sql);
  if ($res->num_rows > 0){
      while($row=$res->fetch_assoc()){
        echo'

<div id="card">
<img id="card-img" src="images/'.$row["img"].'" alt="" >
<div id="h">
<h1 id="card-name">'.$row["name"].' </h1>
<h1 id="card-status">'.$row["status"].'</h1>
</div>
<a  id="btttn" href="chat.php?out='.$_SESSION['out'].'&in='.$row["unique_id"].'">chat</a>
</div>';
        }

 }
?>
