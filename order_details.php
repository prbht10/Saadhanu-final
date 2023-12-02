<?php

/* not paid
shipped
delivered */


include('server/connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

    $order_id = $_POST['order_id'];

    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_vehicles WHERE order_id = ?");

    $stmt->bind_param('i',$order_id);

    $stmt->execute();

    $order_details = $stmt->get_result();

   $order_total_price = calculateTotalOrderPrice($order_details);
    
}else{

header('location: account.php');
exit;

}


function calculateTotalOrderPrice($order_details){

    $total = 0;
    
    foreach($order_details as $row) { 

        $vehicle_price = $row['vehicle_price'];

        $total = $total + $vehicle_price;
    }
    
    
    return $total;
  
  
  }






?>






<?php include('layouts/header.php');    ?>



<!-- Orders details -->

<section id="orders" class="orders container my-5 py-3">
        <div class="container mt-5">
            <h2 class="font-weight-bold text-center"> Orders Details </h2>
            <p id="design-element"></p>

        </div>    

        <table class="mt-5 pt-5 mx-auto">
          <tr>
            <th> Vehicle </th>
            <th> Price </th>
            
          </tr>

          <?php foreach($order_details as $row) {  ?>
        
                  <tr>
                     <td>
                        <div class="product-info">
                           <img src="assets/images/<?php echo $row['vehicle_image']; ?>" alt="">
                           <div>
                              <p class="mt-3"> <?php echo $row['vehicle_name']; ?> </p>
                           </div>

                         </div>
                         
                       </td>
                      <td>
                        <span> Rs. <?php echo $row['vehicle_price']; ?> </span>
                      </td>

                     

                      

                      
                  
                   </tr>
          <?php } ?>
          
        </table>

        <?php if($order_status == "not paid"){ ?>
                <form style="float:right;" method="POST" action="payment.php">
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                    <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>">
                    
                    <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">

                    <button type="submit" name="order_pay_btn" class="btn btn-primary"> Payment Options </button>
                </form>
        
        <?php } ?>

        

</section>   
 


<?php include('layouts/footer.php');    ?>