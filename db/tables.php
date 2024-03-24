<?php 


$usersSql = "CREATE TABLE IF NOT EXISTS  users (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(80) NOT NULL,
    email VARCHAR(50),
    img_url VARCHAR(50),
    gender VARCHAR(50),
    user_type VARCHAR(50),
    wallet_amount  INT(10),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$lessonsSql = "CREATE TABLE IF NOT EXISTS lessons (
    lessons_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    description  TEXT(5000) NOT NULL,
    paid boolean, 
    category_id INT(6) UNSIGNED,
    comment_id INT(6) UNSIGNED,
    img_url  TEXT NOT NULL,
    video_url  TEXT NOT NULL,
    teacher_id INT(6) UNSIGNED,
    status VARCHAR(30) NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT FK_lessons_user FOREIGN KEY (teacher_id) REFERENCES users(user_id),
    CONSTRAINT FK_lessons_category FOREIGN KEY (category_id) REFERENCES categories(id),
    )";
  
$commentSql = 'CREATE TABLE IF NOT EXISTS categories (
    comment_id  INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    comment TEXT,
    user_id INT(6) UNSIGNED,
    lessons_id INT(6) UNSIGNED,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT FK_comment_user FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT FK_comment_lessons FOREIGN KEY (lessons_id) REFERENCES lessons(lessons_id)
)';

$categorySql = 'CREATE TABLE IF NOT EXISTS categories (
    category_id  INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    categories_name TEXT,
    lessons_id INT(6) UNSIGNED,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT FK_categories_lessons FOREIGN KEY (lessons_id) REFERENCES lessons(lessons_id)
)';

       
    if ($DBconn->query($sql) === TRUE) {
      echo "Table users created successfully";
    } else {
      echo "Error creating table: users " . $DBconn->error;
    }

    if ($DBconn->query($sqlRecipe) === TRUE) {
        echo '<pre>'. "Table lessons created successfully". '/<pre>';
      } else {
        echo "Error creating table: Recipe " . $DBconn->error;
      }
    $DBconn->close();

    
?>