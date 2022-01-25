<?php 
require_once "header.php";
require_once "config.php";?>
<body>
<div id="form">
 
<form  method="post"><br>
<label id="h1">Log-in</label><br>
<label>NAME</label>
<input  type="text" required autocomplete="off" name="name"placeholder="Enter the name">
<label>PASSWORD</label>
<input   type="passsword" required  autocomplete="off" name="pwd"placeholder="Enter the password">
<button name="login" id="bttn">log-in</button>
<div id="a"> 
<p>Don't have an account</p>
<a  href="index.php"id="sig">Register</a></div>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['login'])){
 
    $name=$_POST['name'];
    $password= $_POST['pwd'];
    $query = "SELECT * FROM users WHERE name = '$name'";  
    $res=mysqli_query($con,$query);
    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
    
              if(password_verify($password, $row["password"]))  
              {  
                   //return true;  
                  $status='active now';
                  $sql1="UPDATE users SET status='".$status."' WHERE name='$name'";
                  $res1=mysqli_query($con,$sql1);
              if($res1){
                   header('location:user.php?q='.$row["unique_id"].'');
                 
                  }
                }
            }
        }
    else{
       echo'faildkcmfkcnfcnfc';
    }
}
?>