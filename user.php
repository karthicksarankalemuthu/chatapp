<?php 
require_once "header.php";
require_once "config.php";?>

<?php
$q=$_GET["q"];
if(!isset($q)){
    header("location:login.php");
}
$sql="SELECT * FROM users WHERE unique_id='$q'";
$res=mysqli_query($con,$sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $name=$row["name"];
        $status=$row["status"];
        $img=$row["img"];

    }
}

?>
<body>
<div  id="form">
<div id="header">
<img id="user-img" src="images/<?php echo"$img";?>" alt="" >
<div id="h">
<h1 id="user_name"><?php echo"$name";?></h1>
<h1 id="card-status"><?php echo"$status";?></h1>
</div>
<a href="logout.php?logout_id=<?php echo"$q";?>"   id="log-out">Log-out</a>
</div>
<hr>
<input  type="text" required  autocomplete="off"   onkeyup="search(this.value.trim())" placeholder=" 🔎Search your friends">
<div id="txt">
<?php
$sql="SELECT * FROM users WHERE status='active now' AND NOT unique_id='$q'";
$res=mysqli_query($con,$sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
       
    echo'

<div id="card">
<img id="card-img" src="images/'.$row["img"].'" alt="" >
<div id="h">
<h1 id="card-name">'.$row["name"].' </h1>
<h1 id="card-status">'.$row["status"].'</h1>
</div>
<a  id="btttn" href="chat.php?out='.$q.'&in='.$row["unique_id"].'">chat</a>
</div>';
    }
}

?>
</div>
<script rel="text/javascript">
function search(str){
    // console.log(str)
       let http=new XMLHttpRequest()
       http.onreadystatechange=function(){
           if(this.readyState==4 && this.status ==200){
            document.getElementById("txt").innerHTML = this.responseText;
           }
       }
       http.open("GET","search.php?q="+str,true);
       http.send();
   }

   


       
</script>
</div>
</body>
</html>