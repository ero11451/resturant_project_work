<?php 


include (basePath('controller/recipes/create.php'));

include (basePath('controller/recipes/delete.php'));

include (basePath('controller/recipes/edit.php'));

function recipesIndex()
{
    require(basePath('db/connection.php'));

    $users = query('SELECT * FROM users where user_type = :user_type', ['user_type' => 'chef'],  $conn);
    $categories = query('SELECT * FROM categories ', [], $conn);;
    $locations = query('SELECT * FROM locations ', [], $conn);;


    $user_id  = (bool)empty($_GET['user']) ? '':  $_GET['user'] ;
    $selected_category_id = (bool)empty($_GET['category']) ? '':  $_GET['category'] ;
    $selected_location_id  =   (bool)empty($_GET['location']) ? '':  $_GET['location'] ;

    $recipes = query('SELECT recipes. *,  recipes.img_url as img_url , users.username as username  
     FROM recipes LEFT JOIN users  ON  recipes.teacher_id = users.user_id ', [], $conn);

    if (!(bool)empty($_GET['category'])) {
        $recipes = query('SELECT * FROM recipes where category_id = :category_id',
         ['category_id' => $selected_category_id], $conn);
    }

    if (!(bool) empty($_GET['user'])) {
        $recipes = query('SELECT * FROM recipes where teacher_id = :user_id', ['user_id' => $user_id], $conn);
    }

    if (!(bool) empty($_GET['location'])) {
        $location_id = $_GET['location'];
        $recipes = query('SELECT * FROM recipes where location_id = :location_id', ['location_id' =>  $location_id], $conn);
    }



    loadView('recipes/list',[
     'users' => $users,
     'selected_category_id' => $selected_category_id,
     'selected_location_id' => $selected_location_id,
     'locations' => $locations, 
     'categories' => $categories, 
     'recipes' => $recipes, 
    ]);
}

function recipesDetails($id)
{
    require(basePath('db/connection.php'));
    $selected_id = htmlentities($id);
    $dbRes = query('SELECT * FROM recipes 
     INNER JOIN categories ON categories.category_id = recipes.category_id
     INNER JOIN users ON users.user_id = recipes.teacher_id
     where recipe_id = :recipe_id 
    ', ['recipe_id' => $selected_id], $conn);

    $user_data_id = $dbRes[0]['teacher_id'];

    $user_recipes=  query(
        'SELECT * FROM recipes where teacher_id = :teacher_id ',
        ['teacher_id' => $user_data_id], $conn);

    loadView('recipes/details',['data' =>   $dbRes[0],  'user_recipes' => $user_recipes]);
}