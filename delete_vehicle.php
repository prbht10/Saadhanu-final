<?php session_start(); 

   include('../server/connection.php');
?>

<?php
   
   if(!isset($_SESSION['admin_logged_in'])){
       header('location: login.php');
       exit();

   }


   if(isset($_GET['vehicle_id'])){

    $vehicle_id = $_GET['vehicle_id'];
    $stmt = $conn->prepare("DELETE FROM products_vehicles WHERE vehicle_id=?");
    $stmt->bind_param('i',$vehicle_id);

    if($stmt->execute()){
 
    header('location: vehicles.php?deleted_successfully=Vehicle has been deleted successfully');

    }else{
        header('location: vehicles.php?deleted_failure=Vehicle could not be deleted');
    }
    
   }


?>