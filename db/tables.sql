CREATE DATABASE IF NOT EXISTS benin;
USE benin;

CREATE OR ALTER TABLE IF NOT EXISTS users (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(80) NOT NULL,
    bio TEXT,
    email VARCHAR(50),
    user_img_url VARCHAR(50),
    gender VARCHAR(50),
    user_type VARCHAR(50),
    wallet_amount INT(10),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE OR ALTER TABLE IF NOT EXISTS categories (
    category_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    categories_name VARCHAR(255),
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE OR ALTER TABLE IF NOT EXISTS locations (
    location_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(255),
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE OR ALTER TABLE IF NOT EXISTS recipes (
    recipe_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    paid BOOLEAN,
    img_url TEXT,
    video_url TEXT,
    status VARCHAR(30),
    category_id INT(6) UNSIGNED,
    location_id INT(6) UNSIGNED,
    teacher_id INT(6) UNSIGNED,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT FK_recipes_location FOREIGN KEY (location_id) REFERENCES locations(location_id),
    CONSTRAINT FK_recipes_user FOREIGN KEY (teacher_id) REFERENCES users(user_id),
    CONSTRAINT FK_recipes_category FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE OR ALTER TABLE IF NOT EXISTS comments (
    comment_id  INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    comment TEXT,
    user_id INT(6) UNSIGNED,
    recipes_id INT(6) UNSIGNED,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT FK_comment_user FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT FK_comment_recipes FOREIGN KEY (recipes_id) REFERENCES recipes(recipes_id)
)


       
   
INSERT INTO categories (categories_name)

VALUES ('Appetizers'),
       ('Breakfast'),
       ('Lunch'),
       ('Dinner'),
       ('Desserts'),
       ('Salads'),
       ('Low-Carb'),
       ('Paleo'),
       ('Keto');

INSERT INTO locations (location_name)
VALUES ('Nigeria'),
       ('London'),
       ('Ghana'),
       ('China'),
       ('USA');



       
   