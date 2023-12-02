 <?php

/*$conn= new mysqli("localhost","root","","saadhanu");
if($conn->connect_error){
    die("connection failed!".$conn->connect_error);
}
else{
       //creating a table
       $sql="CREATE TABLE products(
        product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        product_name varchar(100) NOT NULL,
        product_category varchar(100) NOT NULL,
        product_description varchar(255) NOT NULL,
        product_image varchar(255) NOT NULL,
        product_price decimal(6,2) NOT NULL,
        product_special_offer integer(2) NOT NULL,
        product_color varchar(100) NOT NULL
    )";

    $sql="CREATE TABLE orders (
     order_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     order_cost decimal(6,2) NOT NULL,
     order_status varchar(100) NOT NULL DEFAULT on_hold,
     user_id int(11) NOT NULL,
     user_phone int(11) NOT NULL,
     user_city varchar(255) NOT NULL,
     user_addresss varchar(255) NOT NULL,
     order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    )";

    $sql="CREATE TABLE order_items(
        item_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        order_id INT(11) NOT NULL,
        product_id varchar(255) NOT NULL,
        product_name varchar(255) NOT NULL,
        product_image varchar(255) NOT NULL,
        user_id INT(11) NOT NULL,
        order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP

        )";

    $sql="CREATE TABLE users(
        user_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_name varchar(100) NOT NULL,
        user_email varchar(100) NOT NULL UNIQUE KEY,
        user_password varchar(100) NOT NULL
    )";
    }




    if($conn->query($sql)===TRUE){
        echo "Tables created Sucessfully!";
    }
    else{
        die("Error creating table".$conn->error);
    }

?> */