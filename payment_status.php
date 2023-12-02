<?php

session_start();

include('connection.php');

 
 

 

if(isset($_GET['order_id'])){

    

   $order_id = $_GET['order_id'];
    $order_status = "payment on delivery";
    $user_id = $_SESSION['user_id'];
    
    

    //change order_status to payment type choosen by the user

    $stmt= $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
    $stmt->bind_param('si',$order_status,$order_id);

    $stmt->execute(); 

   /* if($_POST['pay_option_btn']){
        $payment_status = $_POST['payment_option'];
    
        $stmt1= $conn->prepare("INSERT INTO payment_info (order_id,user_id,payment_status)
                                VALUES (?,?,?);");
    
        $stmt1->bind_param('iis',$order_id,$user_id,$payment_status);
    
        $stmt1->execute(); */
    

   // store payment type info
          
        



   // go to user account
   header("location: ../account.php?payment_message=Order placed Sucessfully");


}else{

   header("location: ../index.php"); 
   exit;
}

 
















?>