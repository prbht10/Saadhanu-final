<?php

include('server/connection.php');

/* $stmt = $conn->prepare("SELECT * FROM products_vehicles");

$stmt->execute();

$vehicles = $stmt->get_result(); */

// 1. determine the page number
if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
 // if user has already entered page then page number is the one that they selected
  $page_no = $_GET['page_no'];

}else{
  // if user just entered the page then default page is 1
  $page_no = 1;
}

// 2. return number of products

$stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products_vehicles");

$stmt1->execute();

$stmt1->bind_result($total_records);

$stmt1->store_result();

$stmt1->fetch();

// 3. products per page
$total_records_per_page = 4;

$offset = ($page_no-1) * $total_records_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = "2";

$total_no_of_pages = ceil($total_records/$total_records_per_page);


// 4. get all products

$stmt2 = $conn->prepare("SELECT * FROM products_vehicles LIMIT $offset,$total_records_per_page");
$stmt2->execute();
$vehicles = $stmt2->get_result();

?>









<?php include('layouts/header.php');    ?>


  <!--search-->

  <!--for featured Vehicles-->
 <!-- <section id="search" class="my-5 py-5 ms-2" text-left>

    <div class="container mt-5 py-5">
      <p>Search Vehicles</p>
      <hr>
    </div>

    <form action="">
      <div class="row mx-auto container">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <p> Category </p>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="category" id="category_one">
            <label class="form-check-label" for="flexRadioDefault1">
              Two Wheelers
            </label>
 
           </div>
        
          </div class="form-check">
          <input type="radio" class="form-check-input" name="category" id="category_two">
          <label class="form-check-label" for="flexRadioDefault2">
            Cars
          </label>
      </div>


      </div>
    </div>

  <div class="row mx-auto container mt-5">
    <div class="col-lg-12 col-md-12 col-sm-12">

      <p> Price </p>
      <input type="range" class="form-range w-50" min="1" max="1000" id="customRange2">
      <div class="w-50">
        <span style="float: left;"> 1</span>
        <span style="float: right;"> 1000</span>
        
      </div>

    </div>
  </div>
    
 <div class="form-group my-3 mx-3"> 
  <input type="submit" name="search" value="Search" class="btn btn-primary">
 </div>

  </form>

  </section> -->

      <!--featured products -->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
         
          <h2> Vehicles </h2>
           </div>
          

        <div class="row mx-auto container-fluid">

          <?php while($row = $vehicles->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="/assets/images/<?php echo $row['vehicle_image']; ?>"/>
            <h5 class="p-name"> <?php echo $row['vehicle_name']; ?> </h5>
            <h4 class="p-price"> Rs. <?php echo $row['vehicle_price']; ?> </h4>
            <a href="<?php echo "vehicle_details.php?vehicle_id=".$row['vehicle_id'];  ?>"> <button class="BuyNow"> Check Now! </button> </a> 
             </div>

           <?php } ?>
                                    
                    
                                       
        <!-- multiple pages -->
        <nav aria-label="Page navigation example">
            <ul class="pagination mt-5 mx-auto">

                <li class="page-item<?php if($page_no<=1){echo 'disabled';} ?>">
                <a class="page-link" href="<?php if($page_no<=1){echo '#';}else{ echo "?page_no=".($page_no-1);} ?>"> Previous </a> 
              </li>


                <li class="page-item"><a class="page-link" href="?page_no=1"> 1 </a> </li>
                <li class="page-item"><a class="page-link" href="?page_no=2"> 2 </a> </li>

                <?php if($page_no >= 3)  {    ?>
                <li class="page-item"><a class="page-link" href="#"> ... </a> </li>
                <li class="page-item"><a class="page-link" href="<?php echo "?page_no".$page_no; ?>"> <?php echo $page_no;  ?> </a> </li>
                 <?php } ?>

                <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';} ?>">
                <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';} else{echo "?page_no=".($page_no+1); } ?>"> Next </a> </li>
                </ul>

        </nav>
                                                                      
                                                                                                                        
        </div>
       </section>


       <?php include('layouts/footer.php');    ?>