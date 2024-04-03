<?php 


require basePath('vendor/autoload.php');

use Respect\Validation\Validator as v;

function createrecipes()
{
    require(basePath('db/connection.php'));

    $categories =  query('SELECT * FROM categories ', [], $conn);
    $locations =  query('SELECT * FROM locations ', [], $conn);
    $img_url = $title = $description = $category =  "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $img_url  = '';
        $title = test_input($_POST["title"]);
        $description = test_input($_POST["description"]);
        $category_id = test_input($_POST["category_id"]);
        $location_id = test_input($_POST["location_id"]);
        $video_url = test_input($_POST['video_url']);
        $status = test_input($_POST['status']);
        $img_url = $_FILES ? handelFileUpload($_FILES) :  $_POST['img_url'] ;
    
   
        $isValid    =   v::notEmpty()->validate($title) &&  v::notEmpty()->validate($description) &&  v::notEmpty()->validate($category_id);
        
        if ($isValid) {

            $createSql = 'INSERT into recipes (title, description,location_id,  category_id, teacher_id , img_url, video_url,status) 
             Value (:title, :description,:location_id, :category_id, :teacher_id , :img_url , :video_url, :status)';

            $dbRes = query($createSql, [
                'title' => $title, 'description' => $description,
                'location_id' => $location_id,
                'category_id' => $category_id,  
                'teacher_id' => $_SESSION['user']['user_id'],
                'img_url' => $img_url, 
                'video_url' => $video_url,  
                'status' => $status
            ], $conn);

            if ((bool) !$dbRes) {
                loadView('component/notification', ['message' => 'Item Created successfully',  'type' => 'success']);
            }
        } else {
                loadView('component/notification', ['message' => 'Invalid data credentials',  'type' => 'error']);
        }
                loadView('recipes/create', ['categories' => $categories,'locations' => $locations]);
    } else {
                loadView('recipes/create', ['categories' => $categories,'locations' => $locations]);
    }
}
?>
