<?php include('header.php');  ?>

<?php
   
   if(!isset($_SESSION['admin_logged_in'])){
       header('location: login.php');
       exit();

   }


?>


<?php


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



<div class="container-fluid">
  <div class="row">
   
  <?php include('sidemenu.php');  ?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <!-- <div class="btn-group me-2">
           <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div> 
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        </div>
      </div>

     <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <h2>Vehicles</h2>
      <?php if(isset($_GET['edit_success_message'])){  ?>
        <p class="text-center" style="color: green;"><?php echo $_GET['edit_success_message']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['edit_failure_message'])){  ?>
        <p class="text-center" style="color: red;"><?php echo $_GET['edit_failure_message']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['deleted_successfully'])){  ?>
        <p class="text-center" style="color: green;"><?php echo $_GET['deleted_successfully']; ?></p>
        <?php } ?>


        <?php if(isset($_GET['deleted_failure'])){  ?>
        <p class="text-center" style="color: red;"><?php echo $_GET['deleted_failure']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['vehicle_created'])){  ?>
        <p class="text-center" style="color: green;"><?php echo $_GET['vehicle_created']; ?></p>
        <?php } ?>


        <?php if(isset($_GET['vehicle_failed'])){  ?>
        <p class="text-center" style="color: red;"><?php echo $_GET['vehicle_failed']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['image_updated'])){  ?>
        <p class="text-center" style="color: green;"><?php echo $_GET['image_updated']; ?></p>
        <?php } ?>


        <?php if(isset($_GET['image_failed'])){  ?>
        <p class="text-center" style="color: red;"><?php echo $_GET['image_failed']; ?></p>
        <?php } ?>


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Vehicle Id</th>
              <th scope="col">Vehicle Image</th>
              <th scope="col">Vehicle Name</th>
              <th scope="col">Vehicle Price</th>
              <th scope="col">Vehicle Offer</th>
              <th scope="col">Vehicle Category</th>
              <th scope="col">Vehicle Color</th>
              <th scope="col">Edit Image</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>

          <?php foreach($vehicles as $vehicle){        ?>
            <tr>
              <td><?php echo $vehicle['vehicle_id']; ?></td>
              <td> <img src="<?php echo "../assets/images/".$vehicle['vehicle_image']; ?>" style="width: 70px; height: 70px;"></td>
              <td><?php echo $vehicle['vehicle_name']; ?></td>
              <td><?php echo "Rs.".$vehicle['vehicle_price']; ?></td>
              <td><?php echo $vehicle['vehicle_special_offer']."%"; ?></td>
              <td><?php echo $vehicle['vehicle_category']; ?></td>
              <td><?php echo $vehicle['vehicle_color']; ?></td>

              <td><a href="<?php echo "edit_image.php?vehicle_id=".$vehicle['vehicle_id']."&vehicle_name=".$vehicle['vehicle_name']; ?>" class="btn btn-warning">Edit Image</a></td>
              <td><a href="edit_vehicle.php?vehicle_id=<?php echo $vehicle['vehicle_id']; ?>" class="btn btn-primary">Edit</a></td>
              <td><a href="delete_vehicle.php?vehicle_id=<?php echo $vehicle['vehicle_id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            
            <?php } ?>
          </tbody>
        </table>
       
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
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
