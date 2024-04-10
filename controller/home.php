<?php




function homeIndex()
{
    require(basePath('db/connection.php'));


    // $users = query('SELECT * FROM users where user_type = :user_type', ['user_type' => 'chef'],  $conn);
    $users = query('SELECT * FROM users ', [],  $conn);
    $categories = query('SELECT * FROM categories ', [], $conn);;
    $locations = query('SELECT * FROM locations ', [], $conn);;


    $user_id  = (bool)empty($_GET['user']) ? '':  $_GET['user'] ;
    $selected_category_id = (bool)empty($_GET['category']) ? '':  $_GET['category'] ;
    $selected_location_id  =   (bool)empty($_GET['location']) ? '':  $_GET['location'] ;

    $recipes = query('SELECT 
        recipes.*, locations.*, categories.*, 
        recipes.img_url AS img_url, 
        users.username AS username  
    FROM 
        recipes 
    LEFT JOIN 
        users ON recipes.teacher_id = users.user_id 
    JOIN 
        locations ON recipes.location_id = locations.location_id
    JOIN 
    categories ON recipes.category_id = categories.category_id;
    ', [], $conn);

    // if ($_SESSION['user']['user_type'] == 'admin') {
    //     $recipes = query('SELECT recipes. *,  recipes.img_url as img_url , users.username as username  
    //     FROM recipes LEFT JOIN users  ON  recipes.teacher_id = users.user_id ', [], $conn);
    // }

    

    if (!(bool)empty($_GET['category'])) {
        $recipes = query('SELECT * FROM recipes  where category_id = :category_id',
         ['category_id' => $selected_category_id], $conn);
    }

    if (!(bool) empty($_GET['user'])) {
        $recipes = query('SELECT * FROM recipes where teacher_id = :user_id', ['user_id' => $user_id], $conn);
    }

    if (!(bool) empty($_GET['location'])) {
        $location_id = $_GET['location'];
        $recipes = query('SELECT * FROM recipes where location_id = :location_id', ['location_id' =>  $location_id], $conn);
    }


 

   
    loadView('home', [
        'users' => $users, 
        'categories' => $categories, 
        'recipes' => $recipes, 
        'locations' => $locations, 
        'selected_location_id' =>  $selected_location_id , 
        'selected_category_id' => $selected_category_id,
        'user_id' =>  $user_id
    ]);
}
