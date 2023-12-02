CREATE TABLE IF NOT EXISTS `products_two_wheelers` (
        `twowheel_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `twowheel_name` varchar(100) NOT NULL,
        `twowheel_category` varchar(100) NOT NULL,
        `twowheel_description` varchar(255) NOT NULL,
        `twowheel_image` varchar(255) NOT NULL,
        `twowheel_price` varchar(12) NOT NULL,
        `twowheel_special_offer` integer(2) NOT NULL,
        `twowheel_color` varchar(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    CREATE TABLE IF NOT EXISTS `products_cars` (
        `car_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `car_name` varchar(100) NOT NULL,
        `car_category` varchar(100) NOT NULL,
        `car_description` varchar(255) NOT NULL,
        `car_image` varchar(255) NOT NULL,
        `car_price` varchar(12) NOT NULL,
        `car_special_offer` integer(2) NOT NULL,
        `car_color` varchar(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `orders` (
     `order_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `order_cost` varchar(12) NOT NULL,
     `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
     `user_id` int(11) NOT NULL,
     `user_phone` int(11) NOT NULL,
     `user_city` varchar(255) NOT NULL,
     `user_addresss` varchar(255) NOT NULL,
     `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `order_items` (
        `item_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `order_id` INT(11) NOT NULL,
        `product_id` varchar(255) NOT NULL,
        `product_name` varchar(255) NOT NULL,
        `product_image` varchar(255) NOT NULL,
        `user_id` INT(11) NOT NULL,
        `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP

        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
        `user_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `user_name` varchar(100) NOT NULL,
        `user_email` varchar(100) NOT NULL UNIQUE KEY,
        `user_password` varchar(100) NOT NULL,
        UNIQUE KEY 'UX_Constraint' (`user_email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    