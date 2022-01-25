<?php 
     session_start();
     require_once "config.php";
    if(isset($_SESSION['out'])){
        
        $outgoing_id =$_SESSION['out'];
        $incoming_id = $_SESSION['in'];
        $message = $_POST['message'];
        if(!empty($message)){
            $sql = mysqli_query($con, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
       }
   }else{
    echo'meaasge send failed';
       
    }


    
?>