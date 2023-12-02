<?php 

include('../server/connection.php');

if(isset($_POST['create_vehicle'])){

    $vehicle_name = $_POST['name'];
    $vehicle_description = $_POST['description'];
    $vehicle_price = $_POST['price'];
    $vehicle_special_offer = $_POST['offer'];
    $vehicle_category = $_POST['category'];
    $vehicle_color = $_POST['color'];

    // this is the file itself (image)
    $vehicle_image = $_FILES['vehicle_image']['tmp_name'];

    // image names
    $image_name = $vehicle_name.".png"; // tvs raider 125main.png

    // upload images
    move_uploaded_file($vehicle_image,"../assets/images/".$image_name);


    // create a new vehicle

    $stmt = $conn->prepare("INSERT INTO products_vehicles (vehicle_name,vehicle_description,vehicle_price,vehicle_special_offer,vehicle_image,vehicle_category,vehicle_color)
                             VALUES(?,?,?,?,?,?,?)");

    $stmt->bind_param('ssiisss',$vehicle_name,$vehicle_description,$vehicle_price,$vehicle_special_offer,$image_name,$vehicle_category,$vehicle_color);

    if($stmt->execute()){
        header('location: vehicles.php?vehicle_created=Vehicle has been created successfully');
    }else{
        header('location: vehicles.php?vehicle_failed=Error creating Vehicle');
    }
}










?>