<?php

include('server/connection.php');

if(isset($_GET['vehicle_id'])){

//for two-wheelers

$vehicle_id = $_GET['vehicle_id'];

$stat= $conn->prepare("SELECT * FROM products_vehicles WHERE vehicle_id=?");
$stat->bind_param("i", $vehicle_id);

$stat->execute();

$vehicle = $stat->get_result();



// when no product id given
}else{

    header('location: index.php');
}

?>


<?php include('layouts/header.php');    ?>


      <!-- Single Product -->
    <section class="container single-product my-5 pt-5">
      <div class="row mt-5">

      <?php while($row = $vehicle->fetch_assoc()){ ?>

        
        <div class="col-lg-5 col-md-6 col-sm-12">
          <img class="img-fluid w-100 pb-1" src="assets/images/<?php echo $row['vehicle_image']; ?>" alt="">
          <div class="small-img-group">
            <div class="small-img-col">
              <img src="" width="100%" class="small-img">

            </div>
             </div>


        </div>
        

        <div class="col-lg-6 col-md-12 col-sm-12">
          <h5> <?php echo $row['vehicle_category']; ?> </h5>
          <h3 class="py-4"> <?php echo $row['vehicle_name']; ?> </h3>
          <h2> Rs. <?php echo $row['vehicle_price']; ?> </h2>

          <form method="POST" action="cart.php">
          <input type="hidden" name="vehicle_id" value="<?php echo $row['vehicle_id']; ?>">
          <input type="hidden" name="vehicle_image" value="<?php echo $row['vehicle_image']; ?>">
          <input type="hidden" name="vehicle_name" value="<?php echo $row['vehicle_name']; ?>">
          <input type="hidden" name="vehicle_price" value="<?php echo $row['vehicle_price']; ?>">

         <!-- <input type="number" name="twowheel_quantity" value="1"> -->
          <button class="BuyNow" type="submit" name="add_to_cart"> Add to cart </button>
          </form>
          <h4 class="mt-5 mb-5"> Vehicle Description </h4>
          <ul>
          <li><span> <?php echo $row['vehicle_description']; ?>  </span></li>
          
          </ul>
           </div>

      

           <?php } ?>
        
         </div>

    </section>

    <!--featured products -->
    <section id="featured_twowheel" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3> Great Deals </h3>
          <p id="design-element"></p>
          <p> Get Newer Models in Great Prices </p>
          <h4> Two-wheelers </h4>
          <p id="design-element"></p>
           </div>
          

        <div class="row mx-auto container-fluid">

        <?php
          include('server/get_twowheel.php');
        ?>

        <?php while($row= $twowheel->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="/assets/images/<?php echo $row['vehicle_image']; ?>"/>
            <h5 class="p-name"> <?php echo $row['vehicle_name']; ?> </h5>
            <h4 class="p-price"> Rs. <?php echo $row['vehicle_price']; ?> </h4>
            <a href="<?php echo "vehicle_details.php?vehicle_id=".$row['vehicle_id'];?>"> <button class="BuyNow"> Check Now! </button></a>
            
             </div>

             

        <?php } ?>

        
               
          

        </div>
       </section>



       <section id="featured_car" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          
          <h4> Cars </h4>
          <p id="design-element"></p>
           </div>
          

        <div class="row mx-auto container-fluid">

      
        

       <?php include('server/get_car.php');  ?>
        <?php  while($row= $car->fetch_assoc()){ ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="/assets/images/<?php echo $row['vehicle_image']; ?>"/>
            <h5 class="p-name"> <?php echo $row['vehicle_name']; ?> </h5>
            <h4 class="p-price"> Rs. <?php echo $row['vehicle_price']; ?> </h4>
            <a href="<?php echo "vehicle_details.php?vehicle_id=".$row['vehicle_id'];?>"> <button class="BuyNow"> Check Now! </button></a>
             </div>

             

        <?php }  ?>

        </div>
       </section>














     <?php include('layouts/footer.php');    ?>