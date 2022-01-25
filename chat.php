<?php 
session_start();
include_once "header.php";
include_once "config.php" ;?>
<?php
 $inco=$_GET['in'];
 $outco=$_GET['out'];
$_SESSION['out']=$outco;
$_SESSION['in']=$inco;
$sql="SELECT * FROM users WHERE unique_id='$inco'";
$res=mysqli_query($con,$sql);
if($res->num_rows>0){
  while($row=$res->fetch_assoc()){
        $name=$row["name"];
        $status=$row["status"];
        $img=$row["img"];
  }
}

?>
<body id="back">
  <div class="wrapper">
    <section class="chat-area">
      <header>
        
        <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="images/<?php echo"$img";?>" alt="">
        <div class="details">
          <span><?php echo"$name";?></span>
          <p><?php echo"$status";?></p>
        </div>
      </header>
      <div class="chat-box">
                                            
                               
      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $inco; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button name="btn"id="button"><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script rel="text/javascript" src="chat.js"></script>

</body>
</html>
