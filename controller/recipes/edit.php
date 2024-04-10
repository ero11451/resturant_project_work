<?php 


require basePath('vendor/autoload.php');

use Respect\Validation\Validator as v;

function updaterecipes()
{
    require(basePath('db/connection.php'));

    $categories =  query('SELECT * FROM categories ', [], $conn);
    $locations =  query('SELECT * FROM locations ', [], $conn);
    $selectedData;
    $img_url = $title = $description = $category =  "";
    $id ;
    if (isset($_GET['recipes'])){
        $id = $_GET['recipes'];
        $selectedData =  query('SELECT * FROM recipes where recipe_id = :id', 
        ['id' => $id], $conn);
    }

 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $title = test_input($_POST["title"]);
        $description = test_input($_POST["description"]);
        $category_id = test_input($_POST["category_id"]);
        $location_id = test_input($_POST["location_id"]);
        $video_url = test_input($_POST['video_url']);
        $status = test_input($_POST['status']);
        $img_url_selected  = $selectedData[0]['img_url'];
        if ( $img_url_selected == NULL) {
            $img_url =  handelFileUpload($_FILES);
        }else{
            $img_url = $img_url_selected;
        }
        
        $isValid = v::notEmpty()->validate($title) &&  v::notEmpty()->validate($description) &&  v::notEmpty()->validate($category_id);
      
        if ($isValid) {
   
            $editSql = 'UPDATE  recipes  SET 
                title = :title,
                description = :description,
                category_id = :category_id,
                location_id = :location_id,
                img_url = :img_url, 
                video_url = :video_url,
                status = :status 
                where recipe_id = :id';
   
            $dbRes = query($editSql, [
                'id' =>  $id,
                'title' => $title, 
                'description' => $description,
                'category_id' => $category_id,  
                'location_id' => $location_id,
                'img_url' => $img_url, 
                'video_url' => $video_url,  
                'status' => $status
            ], $conn);

            if ((bool) !$dbRes) {
                loadView(
                    'component/notification', [
                        'message' => 'Item Updated successfully',  
                        'type' => 'success'
                    ]);
            }
        } else {
            loadView(
                'component/notification', [
                'message' => 'Invalid data credentials',
                'type' => 'error'
            ]);
        }

        loadView(
            'recipes/create', [
                'categories' => $categories, 
                'locations' => $locations , 
                'selectedData' => $selectedData[0]
            ]);
        
    } else {

        loadView(
            'recipes/create', [
            'categories' => $categories, 
            'locations' => $locations , 
            'selectedData' => $selectedData[0]]);
    }
}
?>
