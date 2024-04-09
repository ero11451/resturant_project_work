

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

INSERT IGNORE INTO categories (categories_name)
VALUES ('Appetizers'), ('Breakfast'), ('Lunch'), ('Dinner'),
       ('Desserts'), ('Salads'), ('Low-Carb'), ('Paleo'), ('Keto');

INSERT IGNORE INTO locations (location_name)
VALUES ('Nigeria'), ('UK'), ('Ghana'), ('Benin'), ('China'), ('USA');



INSERT IGNORE INTO users (
    username,
    password,
    bio, 
    email, 
    user_img_url, 
    gender, 
    user_type , 
    wallet_amount,
    reg_date  )
VALUES (
    'admin', 
    "$2y$10$6OJNAqGiuRLGaGduFearsOvz4C0NjssXqOo5Md5Sq.dOFscLuvjkG", 
    'the admin of the application.',
    'admin@gmail.com' ,  
    'uploads/young-smiling-woman-making-bruschetta-with-healthy-ingredients-while-preparing-food-kitchen.jpg', 
    'male', 
    'admin' , 
    100, 
    "2024-04-05 19:27:50" 
    ),
    (
      'chef_chi', 
      '$2y$10$6OJNAqGiuRLGaGduFearsOvz4C0NjssXqOo5Md5Sq.dOFscLuvjkG', 
      'best chef in the world', 
      'chef_chi@gmail.com', 
      null, 
      'male', 
      'chef', 
      100, 
      '2024-04-05 19:27:50'
    ),
    (
      'john_mic', 
      '$2y$10$6OJNAqGiuRLGaGduFearsOvz4C0NjssXqOo5Md5Sq.dOFscLuvjkG', 
      'admin 3 bio', 
      'john_mic@gmail.com', 
      null, 
      'female', 
      'user', 
      100, 
      '2024-04-05 19:27:50'
      );







-- INSERT IGNORE INTO recipes (
--     title, description, paid, img_url, video_url,
--     status, category_id, location_id, teacher_id
-- ) VALUES (
--     'Banga Soup | Niger-Delta style palm nut soup', 
--     'Banga soup is one of the best nourishing soups you can make with palm nuts. All it takes is an assortment of spice flavorings, an assortment of meat and fish, and finishing it off with a touch of ”beletete” to elevate this soup. It’s an easy recipe that delivers terrific results!',
--     1,
--     '/Users/user/Desktop/resturant_project_work/uploads/banga_soup_image.jpeg', 
--     'video1.mp4', 
--     'Public', 
--     1, 3, 2
-- ), (
--     'Baked Chicken Wings with Teriyaki Sauce', 
--     '* 		Marinate the Chicken:
--     * In a large bowl, mix together soy sauce, brown sugar, rice vinegar, minced garlic, and minced ginger to make the teriyaki sauce.
--     * Reserve about 1/4 cup of the sauce for later use.
--     * Add the chicken wings to the bowl with the remaining teriyaki sauce and toss to coat evenly.
--     * Cover the bowl and marinate the chicken wings in the refrigerator for at least 30 minutes, or ideally, overnight.
-- * 		Preheat the Oven:
--     * Preheat your oven to 400°F (200°C).
-- * 		Prepare the Baking Sheet:
--     * Line a baking sheet with parchment paper or aluminum foil for easy cleanup.
--     * Arrange the marinated chicken wings in a single layer on the prepared baking sheet, leaving space between each wing.
-- ', 
--     0,  
--     '/Users/user/Desktop/resturant_project_work/uploads/baked-chicken-wings-with-teriyaki-sauce.jpg',
--     'video2.mp4', 
--     'Public',
--     1, 2, 2
-- ), (
--     'spaghetti bolognese', 
--     'STEP 1 Put a large saucepan on a medium heat and add 1 tbsp olive oil. STEP 2 Add 4 finely chopped bacon rashers and fry for 10 mins until golden and crisp. STEP 3 Reduce the heat and add the 2 onions, 2 carrots, 2 celery sticks, 2 garlic cloves and the leaves from 2-3 sprigs rosemary, all finely chopped, then fry for 10 mins. Stir the veg often until it softens.', 
--     1, 
--     '/Users/user/Desktop/resturant_project_work/uploads/fresh-pasta-with-hearty-bolognese-parmesan-cheese-generated-by-ai.jpg', 
--     'video3.mp4', 
--     'Public',
--     3, 2, 2
-- );
