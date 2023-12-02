<?php

session_start();

if(isset($_POST['add_to_cart'])){

    //if user has already added a vehicle to cart
    if(isset($_SESSION['cart'])){

        $vehicle_array_ids = array_column($_SESSION['cart'], "vehicle_id"); // [2,3,5,10]

        // if vehicle has already been added to cart or not
        if(!in_array($_POST['vehicle_id'], $vehicle_array_ids)){

      $vehicle_id = $_POST['vehicle_id'];
            $vehicle_array= array(
                             'vehicle_id'=> $_POST['vehicle_id'],
                             'vehicle_name'=> $_POST['vehicle_name'],
                             'vehicle_price'=> $_POST['vehicle_price'],
                             'vehicle_image'=> $_POST['vehicle_image'],
                             //'vehicle_quantity'=> $_POST['vehicle_quantity']
      
            );
      
            $_SESSION['cart'][$vehicle_id] = $vehicle_array;
 

        // vehicle has already been added
        }else{
         
            echo '<script> alert("Vehicle was already added to cart"); </script>';
            

        }


        //if this is the first vehicle

    }else{

      $vehicle_id= $_POST['vehicle_id'];
      $vehicle_name= $_POST['vehicle_name'];
      $vehicle_price= $_POST['vehicle_price'];
      $vehicle_image= $_POST['vehicle_image'];
      //$vehicle_quantity= $_POST['vehicle_quantity'];

      $vehicle_array= array(
                       'vehicle_id' => $vehicle_id,
                       'vehicle_name' => $vehicle_name,
                       'vehicle_price' => $vehicle_price,
                       'vehicle_image' => $vehicle_image,
                       //'twowheel_quantity' => $twowheel_quantity

      );

      $_SESSION['cart'][$vehicle_id] = $vehicle_array;
        // [2=>[], 3=>[], 5=>[] ]
    }

   //calculate total 
 calculateTotalCart();





//remove vehicles from cart

}else if(isset($_POST['remove'])){
  
  $vehicle_id = $_POST['vehicle_id'];
  unset($_SESSION['cart'][$vehicle_id]);
  
  //calculate total 
 calculateTotalCart();






}else{
  // header('location: index.php');

}


function calculateTotalCart(){

  $total = 0;
  
  
  foreach($_SESSION['cart'] as $key =>$value){


    $vehicle = $_SESSION['cart'][$key];
    $price = $vehicle['vehicle_price'];
    $total = $total + $price;
  }

$_SESSION['total'] = $total;
}







?>











<?php include('layouts/header.php');    ?>

      <!--Cart-->
      <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde"> Your Cart </h2>
            

        </div>
        <table class="mt-5 pt-5">
           <tr>
            <th> Vehicle </th>
           <th> </th>
            <th> Subtotal </th>
           </tr>

       <?php if(isset($_SESSION['cart'])){ ?>
          
           
           <?php
          
            foreach($_SESSION['cart'] as $key => $value){ ?>

           <tr>
            <td>
                <div class="product-info">
                  <img src="assets/images/<?php echo $value['vehicle_image']; ?>" alt="">
                  
                  <div>
                    <p> <?php echo $value['vehicle_name']; ?> </p>
                   
                    <small> <span> Rs.</span> <?php echo $value['vehicle_price']; ?> </small>
                  
                    <br>
                    <form method="POST" action="cart.php">
                    <input type="hidden" name="vehicle_id" value="<?php echo $value['vehicle_id']; ?>" />
                    <input type="submit" name="remove" class="remove-btn" value="remove"/>
         
                    </form>
                  </div>
                </div>
            </td>

            <td>
              <!--  <input type="number" value="<?php //echo $value1['twowheel_quantity']; ?>"> -->
                
               <!-- <a class="edit-btn" href="#"> Edit </a> -->
            </td>

            <td>
                <span> Rs.</span>
                <span class="product-price"> <?php echo $value['vehicle_price']; ?> </span>
            </td>
           </tr>

          <?php }  ?>
          
      <?php } ?>
        
         


          
 </table>

        

           
        
 <div class="cart-total">
            <table>
              <!--  <tr>
                    <td> Subtotal </td>
                    <td> Rs.175,000</td> 
                </tr> -->
                <tr>
                    <td>Total</td>
                    <?php if(isset($_SESSION['cart'])){ ?>
                    <td>Rs. <?php echo $_SESSION['total']; ?></td>
                    <?php } ?>
                </tr>
            </table>
        </div>

        <div class="checkout-container">

        <form method="POST" action="checkout.php">
          <button type="submit" class="btn checkout-btn" name="checkout"> Checkout </button>
          </form> 
          
        
        </div>

         </section>





     <?php include('layouts/footer.php');    ?>