<?php

include('connection.php');

//for vehicles

$stat= $conn->prepare("SELECT * FROM products_vehicles LIMIT 8");


$stat->execute();

$featured_products = $stat->get_result();



?>