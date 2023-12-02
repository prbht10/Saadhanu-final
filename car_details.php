 <?php ?>

/* include('server/connection.php');

if(isset($_GET['car_id'])){

//for two-wheelers

$car_id = $_GET['car_id'];

$stat2= $conn->prepare("SELECT * FROM products_cars WHERE car_id=?");
$stat2->bind_param("i", $car_id);

$stat2->execute();

$car = $stat2->get_result();



// when no product id given
}else{

    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Product Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">

      <div class="container">
        <img src="assets/images/saadhanu-logo.png" alt="logo"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cars.html"> Cars </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="twowheeler.html"> Two-Wheelers </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html"> Contact Us </a>
            </li>
            
            <li class="nav-item">
              <a href="cart.html"> <i class="fas fa-shopping-cart"> </i> </a>
             <a href="account.html"> <i class="fas fa-user"> </i> </a>
           
            </li>
           
            
            </ul>
        </div>
      </div>
    </nav>
 
      <!-- Single Product -->
    <section class="container single-product my-5 pt-5">
      <div class="row mt-5">

      <?php while($row = $car->fetch_assoc()){ ?>
        <div class="col-lg-5 col-md-6 col-sm-12">
          <img class="img-fluid w-100 pb-1" src="assets/images/<?php echo $row['car_image']; ?>" alt="">
          <div class="small-img-group">
            <div class="small-img-col">
              <img src="" width="100%" class="small-img">

            </div>
             </div>


        </div>
        

        <div class="col-lg-6 col-md-12 col-sm-12">
          <h5> Car </h5>
          <h3 class="py-4"> <?php echo $row['car_name']; ?> </h3>
          <h2> Rs. <?php echo $row['car_price']; ?> </h2>

          <form method="POST" action="cart.php">
          <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
          <input type="hidden" name="car_image" value="<?php echo $row['car_image']; ?>">
          <input type="hidden" name="car_name" value="<?php echo $row['car_name']; ?>">
          <input type="hidden" name="car_price" value="<?php echo $row['car_price']; ?>">

          <!--<input type="number" name="car_quantity" value="1">-->
          <button class="BuyNow" type="submit" name="add_to_cart2"> Add to cart </button>

          </form>
          <h4 class="mt-5 mb-5"> Vehicle Description </h4>
          <ul>
          <li><span> <?php echo $row['car_description']; ?>  </span></li>
          
          </ul>
           </div>

           <?php } ?>
        
         </div>

    </section>

    <!--featured products -->
    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3> Great Deals </h3>
        <p id="design-element"></p>
        <p> Get Newer Models in Great Prices </p>
        <h4> Two-Wheelers </h4>
         </div>
        

      <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="/assets/images/tvs raid.png"/>
          <h5 class="p-name"> TVS Raider 125 </h5>
          <h4 class="p-price"> Rs. 1,75,000 </h4>
          <button class="BuyNow"> Check Now! </button>
           </div>

           <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="/assets/images/ray125.png"/>
            <h5 class="p-name"> Yamaha Ray ZR 125  FI </h5>
            <h4 class="p-price"> Rs. 1,55,000 </h4>
            <button class="BuyNow"> Check Now! </button>
             </div>

             <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="/assets/images/diio.png"/>
              <h5 class="p-name"> Honda Dio DLX </h5>
              <h4 class="p-price"> Rs. 1,05,000 </h4>
              <button class="BuyNow"> Check Now! </button>
               </div>

               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="/assets/images/xpulse.png"/>
                <h5 class="p-name"> Hero Xpulse 200 4V </h5>
                <h4 class="p-price"> Rs. 3,40,000 </h4>
                <button class="BuyNow"> Check Now! </button>
                 </div>
                 
                 <div class="container text-center mt-5 py-5">
                 <h4> Cars </h4>
                 </div>

                 <div class="row mx-auto container-fluid">
                  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="/assets/images/kiaseltos.png"/>
                    <h5 class="p-name"> Kia Seltos HTK </h5>
                    <h4 class="p-price"> Rs. 38,00,000 </h4>
                    <button class="BuyNow"> Check Now! </button>
                     </div>
        
                     <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                      <img class="img-fluid mb-3" src="/assets/images/i20.png"/>
                      <h5 class="p-name"> Hyundai i20 </h5>
                      <h4 class="p-price"> Rs. 25,00,000 </h4>
                      <button class="BuyNow"> Check Now! </button>
                       </div>
        
                       <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                        <img class="img-fluid mb-3" src="/assets/images/nexon.png"/>
                        <h5 class="p-name"> Tata Nexon EV </h5>
                        <h4 class="p-price"> Rs. 28,50,000 </h4>
                        <button class="BuyNow"> Check Now! </button>
                         </div>
        
                         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                          <img class="img-fluid mb-3" src="/assets/images/suzuki swift.png"/>
                          <h5 class="p-name"> Maruti Suzuki Swift </h5>
                          <h4 class="p-price"> Rs. 18,40,000 </h4>
                          <button class="BuyNow"> Check Now! </button>
                           </div>
        

      </div>
     </section>













     <!-- Site footer -->
 <footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
          
        <h6>About</h6>
        <p class="text-justify">Saadhanu is a web-based platform where you can safely buy and sell new or used cars, bikes, 
          and scooters. 
          Enjoy special discounts, compare vehicles, connect with experts, and get dedicated customer 
          care. <br> Simplifying vehicle trading for you.</p>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Categories</h6>
        <ul class="footer-links">
          <li><a href="twowheeler.html">Two-Wheelers</a></li>
          <li><a href="cars.html">Cars</a></li>

        </ul>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Quick Links</h6>
        <ul class="footer-links">
          
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="#">Call Experts </a></li>
          
        </ul>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by P & S
        </p>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <ul class="social-icons">
          <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
        </ul>
      </div>
    </div>
  </div>
</footer>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>