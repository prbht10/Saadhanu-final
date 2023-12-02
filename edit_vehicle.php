<?php include('header.php');    ?>

<?php

if(isset($_GET['vehicle_id'])){

    $vehicle_id = $_GET['vehicle_id'];
 $stmt = $conn->prepare("SELECT * FROM products_vehicles WHERE vehicle_id=?");
 $stmt->bind_param('i',$vehicle_id);
 $stmt->execute();

 $vehicles = $stmt->get_result();

}else if(isset($_POST['edit_btn'])){

    $vehicle_id = $_POST['vehicle_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $offer = $_POST['offer'];
    $color = $_POST['color'];
    $category = $_POST['category'];
    
    $stmt= $conn->prepare("UPDATE products_vehicles SET vehicle_name=?,vehicle_description=?,vehicle_price=?,
                           vehicle_special_offer=?,vehicle_color=?,vehicle_category=? WHERE vehicle_id=?");
    $stmt->bind_param('ssiissi',$title,$description,$price,$offer,$color,$category,$vehicle_id);

    if($stmt->execute()){

        header('location: vehicles.php?edit_success_message=Vehicle has been Updated Successfully');

    }else{
        header('location: vehicles.php?edit_failure_message=Error occured, try updating again');
    }

   



}else{
    header('vehicles.php');
    exit;
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

      <h2>Edit Vehicle</h2>
      <div class="table-responsive">




    
       
        <div class="mx-auto container">
            <form method="POST" action="edit_vehicle.php" id="edit-form">
            <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?> </p>
                <div class="form-group mt-2">

                <?php foreach($vehicles as $vehicle)  {   ?>

                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                    <label> Title </label>
                    <input type="text" class="form-control" id="vehicle-name" value="<?php echo $vehicle['vehicle_name']; ?>" name="title" placeholder="Title" required/>

                </div>
                <div class="form-group mt-2">
                    <label>Description</label>
                    <input type="text" class="form-control" id="vehicle-desc" value="<?php echo $vehicle['vehicle_description']; ?>" name="description" placeholder="Description" required/>
                </div>

                <div class="form-group mt-2">
                    <label>Price</label>
                    <input type="text" class="form-control" id="vehicle-price" value="<?php echo $vehicle['vehicle_price']; ?>" name="price" placeholder="Price" required/>
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
                    <input type="text" class="form-control" id="vehicle-color" value="<?php echo $vehicle['vehicle_color']; ?>" name="color" placeholder="Color" required/>
                </div>

                <div class="form-group mt-2">
                    <label>Special Offer</label>
                    <input type="number" class="form-control" id="vehicle-offer" value="<?php echo $vehicle['vehicle_special_offer']; ?>" name="offer" placeholder="Offer %" required/>
                </div>


                
                    <div class="form-group mt-3">
                        
                        <input type="submit" class="btn btn-primary" id="edit-btn" name="edit_btn" value="Edit"/>
                        
                    </div>

                    <?php } ?>

                
                    
                
            </form>
        </div>

       
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>









 





