<?php

session_start();

include('connection.php');


// if user is not logged in
if(!isset($_SESSION['logged_in'])){
  header('location: ../checkout.php?message=Please Login/register to place an order');


  // if user is logged in
}else{

          if(isset($_POST['place_order'])){


              // 1. get user info and store it in database
              $name = $_POST['name'];
              $email = $_POST['email'];
              $phone = $_POST['phone'];
              $city = $_POST['city'];
              $address = $_POST['address'];
              $order_cost = $_SESSION['total'];
              $order_status = "not paid";
              $user_id = $_SESSION['user_id'];
              $order_date = date('Y-m-d H:i:s');

            $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_addresss,order_date,user_name,user_email)
                                    VALUES (?,?,?,?,?,?,?,?,?);");

            $stmt->bind_param('isiisssss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date,$name,$email);

            $stmt_status = $stmt->execute();

            if(!$stmt_status){
              header('location: index.php');
              exit;
            }

            // 2. issue new order and store the order info in database

            $order_id = $stmt->insert_id;

            


              // 3. get vehicle from cart (from session)

              foreach($_SESSION['cart'] as $key => $value){

                $vehicle = $_SESSION['cart'][$key];
                $vehicle_id = $vehicle['vehicle_id'];
                $vehicle_name= $vehicle['vehicle_name'];
                $vehicle_image= $vehicle['vehicle_image'];
                $vehicle_price= $vehicle['vehicle_price'];

                // 4. store each single item in order_items database

                $stmt1= $conn->prepare("INSERT INTO order_vehicles (order_id,vehicle_id,vehicle_name,vehicle_image,vehicle_price,user_id,order_date)
                                VALUES(?,?,?,?,?,?,?)");

                $stmt1->bind_param('iissiis',$order_id,$vehicle_id,$vehicle_name,$vehicle_image,$vehicle_price,$user_id,$order_date);

                $stmt1->execute();


              }

            
            
            
                


              


              


              

              
              // 5. remove everything from cart -- delay until payment is done

              //unset($_SESSION['cart']);

              $_SESSION['order_id']= $order_id;

              // 6. inform user whether everything is fine or there is a problem 
              header('location: ../payment.php?order_status=order placed sucessfully');





          }


}











?>