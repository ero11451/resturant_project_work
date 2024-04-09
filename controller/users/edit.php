<?php 


require basePath('vendor/autoload.php');

use Respect\Validation\Validator as v;

function updaterecipes()
{
    require(basePath('db/connection.php'));
 
    $selectedData;
    $user_img_url = $username = $bio = $gender = $user_type =  "";

    $id ;
    if (isset($_SESSION['user'])){
        $id = $_SESSION['user']['user_id'];
        $selectedData =  query('SELECT * FROM recipes where user_id = :id', 
        ['id' => $id], $conn);
    }

 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $$bio = test_input($_POST["bio"]);
        $$gender = test_input($_POST["gender"]);
        $$user_type = test_input($_POST['user_type']);
        $$user_img_url = $_FILES ? handelFileUpload($_FILES) : test_input($_POST["user_img_url"]);;
        
        $isValid = v::notEmpty()->validate($username) &&    v::notEmpty()->validate($email);
      
        if ($isValid) {
   
            $editSql = 'UPDATE  users  SET 
                username = :username,
                email = :email,
                bio = :bio,
                img_url = :img_url, 
                gender = :gender,
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
            'profile', [
                'categories' => $categories, 
                'locations' => $locations , 
                'selectedData' => $selectedData[0]
            ]);
        
    } else {

        loadView(
            'profile', [
            'categories' => $categories, 
            'locations' => $locations , 
            'selectedData' => $selectedData[0]]);
    }
}
?>


