<?php

include('../server/connection.php');

if(isset($_POST['update_image'])){

    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_id = $_POST['vehicle_id'];

    $vehicle_image = $_FILES['vehicle_image']['tmp_name'];

    // image names
    $image_name = $vehicle_name.".png"; // tvs raider 125main.png

    // upload images
    move_uploaded_file($vehicle_image,"../assets/images/".$image_name);

    $stmt = $conn->prepare("UPDATE products_vehicles SET vehicle_image=? WHERE vehicle_id=?");

    $stmt->bind_param('si',$image_name,$vehicle_id);

    if($stmt->execute()){
        header('location: vehicles.php?image_updated=Image has been updated successfully');
    }else{
        header('location: vehicles.php?image_failed=Error updating image');
    }


}











?>