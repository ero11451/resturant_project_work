<?php

require basePath('vendor/autoload.php');

use Respect\Validation\Validator as v;

function lessonsIndex()
{
    loadView('lessons/list');
}


function createLessons()
{

    require(basePath('db/connection.php'));

    $categories =  query('SELECT * FROM categories ', [], $conn);
    $img_url = $title = $description = $category =  "";



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uploadDir = basePath('uploads');
        $img_url  = '';
        $title = $_POST["title"];
        $description = $_POST["description"];
        $category = $_POST["category"];

        $fileName = $uploadDir . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $fileName)) {
          $img_url = $fileName;
        } else {
          echo "there was an error with the file"; 
        }
        

        $isValid    =   v::notEmpty()->validate($title)
            &&  v::notEmpty()->validate($description)
            &&  v::notEmpty()->validate($category);

        if ($isValid) {

            $createSql = 'INSERT into lessons (title, description, category_id, teacher_id , img_url, video_url,status) 
            Value 
            (:title, :description, :category, :teacher_id , :img_url , :video_url, :status)';

            $dbRes = query($createSql, [
                'title' => $title,
                'description' => $description,
                'category' => $category,
                'teacher_id' => $_SESSION['user']['user_id'],
                'img_url' => $img_url,
                'video_url'=> '',
                'status' => ''
            ], $conn);

            if ($dbRes) {
                loadView('component/notification', ['message' => 'Item Created successfully',  'type' => 'success']);
            }
        } else {
            loadView('component/notification', ['message' => 'Invalid data credentials',  'type' => 'error']);
        }

        loadView('lessons/create', ['categories' => $categories]);
    }else{

        loadView('lessons/create', ['categories' => $categories]);
    }
}
