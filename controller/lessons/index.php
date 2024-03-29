<?php 


include (basePath('controller/lessons/create.php'));

include (basePath('controller/lessons/delete.php'));

function lessonsIndex()
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


    loadView('lessons/list',['users' => $users, 'categories' => $categories, 'lessons' => $lessons, 'selected_category_id' => $selected_category_id]);
}

function lessonsDetails($id)
{
    require(basePath('db/connection.php'));
    $selected_id = htmlentities($id);
    $dbRes = query('SELECT * FROM lessons 
     INNER JOIN categories ON categories.category_id = lessons.category_id
     INNER JOIN users ON users.user_id = lessons.teacher_id
     where lessons_id = :lessons_id 
    ', ['lessons_id' => $selected_id], $conn);
    // print_data( $dbRes );
    loadView('lessons/details',['data' =>   $dbRes[0]]);
}