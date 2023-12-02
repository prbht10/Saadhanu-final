<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products_vehicles WHERE vehicle_category='car' LIMIT 4");

$stmt->execute();

$car = $stmt->get_result();






?>