<?php




function homeIndex()
{

    require(basePath('db/connection.php'));


    $users = query('SELECT * FROM users where user_type = :user_type', ['user_type' => 'chef'],  $conn);
    $categories = query('SELECT * FROM categories ', [], $conn);;

    $selected_category_id = (bool)empty($_GET['category']) ? '':  $_GET['category'] ;

    $lessons = query('SELECT * FROM lessons ', [], $conn);

    if (!(bool)empty($_GET['category'])) {
        $lessons = query('SELECT * FROM lessons where category_id = :category_id',
         ['category_id' => $selected_category_id], $conn);
    }

    if (!(bool) empty($_GET['user'])) {
        $user_id =  $_GET["user"] ?? '';
        $lessons = query('SELECT * FROM lessons where teacher_id = :user_id', ['user_id' => $user_id], $conn);
    }


   
    loadView('home', ['users' => $users, 'categories' => $categories, 'lessons' => $lessons, 'selected_category_id' => $selected_category_id]);
}
