

CREATE DATABASE IF NOT EXISTS benin;
USE benin;

CREATE TABLE IF NOT EXISTS users (
    user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(80) NOT NULL ,
    bio TEXT,
    email VARCHAR(50) UNIQUE,
    user_img_url VARCHAR(50) UNIQUE,
    gender VARCHAR(50) ,
    user_type VARCHAR(50),
    wallet_amount INT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categories (
    category_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    categories_name VARCHAR(255) UNIQUE,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS locations (
    location_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(255) UNIQUE,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS recipes (
    recipe_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
    title  VARCHAR(555) UNIQUE,
    description TEXT NOT NULL,
    paid BOOLEAN,
    img_url TEXT,
    video_url TEXT,
    status VARCHAR(30),
    category_id INT UNSIGNED,
    location_id INT UNSIGNED,
    teacher_id INT UNSIGNED,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES locations(location_id),
    FOREIGN KEY (teacher_id) REFERENCES users(user_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE IF NOT EXISTS comments (
    comment_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    comment TEXT,
    user_id INT UNSIGNED,
    recipes_id INT UNSIGNED,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (recipes_id) REFERENCES recipes(recipe_id)
);



