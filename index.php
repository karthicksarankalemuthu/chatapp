<?php 
require_once "header.php";
require_once "config.php";?>

<body>

<form method="post" enctype="multipart/form-data"><br>
<label id="h1">REGISTER NOW</label><br>
<label>NAME</label>
<input  type="text"  name="name"required   autocomplete="off"placeholder="Enter the name">
<label>EMAIL</label>
<input   type="email" name="email" required   autocomplete="off"placeholder="Enter the email">
<label>PASSWORD</label>
<input   type="passsword"  name="pwd"required  autocomplete="off" placeholder="Enter the password">
<label>PROFILE PICTURE</label>
<input   accept="image/*" name="img"  type="file"  autocomplete="off" required >
<button id="bttn" name="btn">Sign-up</button>
<div id="a"> 
<p>already have account</p>
<a  href="login.php"id="sig">log-in</a></div>
</form>

</body>
</html>
<?php
if(isset($_POST['btn'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['pwd'];
$hash_pwd=password_hash($password,PASSWORD_DEFAULT);
$unique_id=rand(100000,999999);
$status='offline now';
$pic = $_FILES['img']["name"];
$folder = "images/";
move_uploaded_file($_FILES['img']["tmp_name"], "$folder".$pic); 

$sql="INSERT INTO users(unique_id,name,email,password,img,status)VALUES('$unique_id','$name','$email','$hash_pwd','$pic','$status')";
$res=mysqli_query($con,$sql);
if($res){
   header("location:login.php");
   
}
else{
    echo"  data insert failed";
};
};

?>