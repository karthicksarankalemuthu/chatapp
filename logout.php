<?php
  
   
        include_once "config.php";
        $logout_id = $_GET['logout_id'];
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location:login.php");
            }
        }else{
            header("location:user.php");
        }
    
?>