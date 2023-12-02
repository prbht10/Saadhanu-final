<?php include('header.php');    ?>

<?php

if(isset($_GET['vehicle_id'])){

    $vehicle_id = $_GET['vehicle_id'];
    $vehicle_name = $_GET['vehicle_name'];

}else{
    header('location: vehicles.php');
}



?>


<div class="container-fluid">
  <div class="row">
   
  <?php include('sidemenu.php');  ?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
      </div>

      <h2>Edit Vehicle Images</h2>
      <div class="table-responsive">


      <div class="mx-auto container">
            <form method="POST" action="update_image.php" id="edit-image-form" enctype="multipart/form-data">
            <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?> </p>

            <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id; ?>">
            <input type="hidden" name="vehicle_name" value="<?php echo $vehicle_name; ?>">

               
                
                <div class="form-group mt-2">
                    <label>Vehicle Image</label>
                    <input type="file" class="form-control" id="vehicle-image" name="vehicle_image" placeholder="Image" required/>
                </div>


                


                
                    <div class="form-group mt-3">
                        
                        <input type="submit" class="btn btn-primary"  name="update_image" value="Update"/>
                        
                    </div>

                   

                
                    
                
            </form>
        </div>

       
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

