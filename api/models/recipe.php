<?php

$recipeTable  = "CREATE TABLE IF NOT EXISTS recipeTesting (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    chef_name VARCHAR(300) NOT NULL,
    chef_id  INT UNSIGNED ,
    title VARCHAR(30) NOT NULL,
    disciption VARCHAR(1000) NOT NULL,
    img_url varchar(255), 
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT FK_ChefRecipe FOREIGN KEY (chef_id) REFERENCES users(id)
    )";
    

?>