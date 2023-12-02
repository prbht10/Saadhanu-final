<?php include('header.php');    ?>


<div class="container-fluid">
  <div class="row">
   
  <?php include('sidemenu.php');  ?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
      </div>

      <h2>Add Vehicle</h2>
      <div class="table-responsive">


      <div class="mx-auto container">
            <form method="POST" action="create_vehicle.php" id="create-form" enctype="multipart/form-data">
            <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?> </p>
                <div class="form-group mt-2">

               
                    <label> Title </label>
                    <input type="text" class="form-control" id="vehicle-name" value="" name="name" placeholder="Title" required/>

                </div>
                <div class="form-group mt-2">
                    <label>Description</label>
                    <input type="text" class="form-control" id="vehicle-desc" value="" name="description" placeholder="Description" required/>
                </div>

                <div class="form-group mt-2">
                    <label>Price</label>
                    <input type="text" class="form-control" id="vehicle-price" value="" name="price" placeholder="Price" required/>
                </div>

                <div class="form-group mt-2">
                    <label>Special Offer</label>
                    <input type="number" class="form-control" id="vehicle-offer" value="" name="offer" placeholder="Offer %" required/>
                </div>

                <div class="form-group mt-2">
                    <label>Category</label>
                    <select class="form-select" required name="category">
                        <option value="Two-wheeler">Two-wheeler</option>
                        <option value="car">car</option>
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label>Color</label>
                    <input type="text" class="form-control" id="vehicle-color" value="" name="color" placeholder="Color" required/>
                </div>

                <div class="form-group mt-2">
                    <label>Vehicle Image</label>
                    <input type="file" class="form-control" id="vehicle-image" value="" name="vehicle_image" placeholder="Image" required/>
                </div>


                


                
                    <div class="form-group mt-3">
                        
                        <input type="submit" class="btn btn-primary"  name="create_vehicle" value="Create"/>
                        
                    </div>

                   

                
                    
                
            </form>
        </div>

       
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

