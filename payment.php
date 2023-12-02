<?php

include('server/connection.php');

session_start();

if(isset($_POST['order_pay_btn'])){

 $order_status = $_POST['order_status'];
 $order_total_price = $_POST['order_total_price'];
}




/*if($_POST['pay_option_btn']){

   $payment_status = $_POST['payment_option'];
   $order_id = $_GET['order_id'];
   $user_id = $_SESSION['user_id'];

    $stmt1= $conn->prepare("INSERT INTO payment_info (order_id,user_id,payment_status)
                            VALUES (?,?,?);");

    $stmt1->bind_param('iis',$order_id,$user_id,$payment_status);

    $stmt1->execute();
 
}*/

?>











<?php include('layouts/header.php');    ?>

  


<!--payment-->

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="form-weight-bold"> Payment </h2>
      <p id="design-element"></p>
     
    </div>
    <div class="mx-auto container text-center">



    <?php if(isset($_POST['order_status']) && $_POST['order_status'] =="not paid" ) {  ?>


        <?php $order_id = $_POST['order_id']; ?>
 <p> Total Payment: Rs. <?php echo $_POST['order_total_price']; ?> </p>
 <input type="submit" onclick="paymentSuccess()" class="btn btn-primary" name="pay_option_btn" value="Payment on Delivery">

<!--<input type="submit" class="btn btn-primary" value="Payment Options">-->
<!--<form method="POST" action="">
        <input type="radio" id="cash_on_delivery" name="payment_option" class="btn" value="Cash on Delivery"> Cash on Delivery

        <br><br>
        <input type="radio"  id="banking_services" name="payment_option" class="btn" value="Banking Services on Delivery"> Banking Services on Delivery
       <p> </p>
        <input type="submit" class="btn btn-primary" name="pay_option_btn" value="Done">

      </form> -->

        
    <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0) {   ?>

      
      <?php $order_id = $_SESSION['order_id'];   ?>
     <p> Total Payment: Rs. <?php  echo $_SESSION['total']; ?> </p>
     <input type="submit" onclick="paymentSuccess()" class="btn btn-primary" name="pay_option_btn" value="Payment on Delivery">
    <!-- <input type="submit" class="btn btn-primary" value="Payment Options"> -->
    <!--<form method="POST" action="">
        <input type="radio" id="cash_on_delivery" name="payment_option" class="btn" value="Cash on Delivery"> Cash on Delivery

        <br><br>
        <input type="radio"  id="banking_services" name="payment_option" class="btn" value="Banking Services on Delivery"> Banking Services on Delivery
       <p> </p>
        <input type="submit" class="btn btn-primary" name="pay_option_btn" value="Done">

      </form> -->

   

     

    <?php } else { ?>

      <p> Your Cart is Empty! </p>

    <?php } ?>


    

     


    </div>

     </section>





<script>
  function paymentSuccess(){
   window.location.href= "server/payment_status.php?order_id="+<?php echo $order_id; ?>;
  }
</script>


     <?php include('layouts/footer.php');    ?>