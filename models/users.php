<?php
      $userTable = "CREATE TABLE users (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_password VARCHAR(280) NOT NULL,
        username VARCHAR(80) NOT NULL,
        user_type VARCHAR(90) NOT NULL,
        email VARCHAR(90) UNIQUE NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
?>