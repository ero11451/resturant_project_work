<?php


require(basePath('db/connection.php'));


 
function getrecipes(  ){

try {
    $sql = 'SELECT  * FROM recipes  ';
    $stmt = $DB->prepare($sql);
    $stmt->execute();
    $resultDB = $stmt->fetchAll();

    $total_stmt = $DBconn->prepare("SELECT COUNT(*) as total FROM recipes");
    $total_stmt->execute();
    $total_results = $total_stmt->fetch(PDO::FETCH_ASSOC)['total'];

    $result['data']  =  $resultDB;
    $result['total'] =  $total_results;
    $result['error'] =  true;
    return $result;
} catch (\Throwable $th) {

    $result['data']  =  $th;
    $result['total'] =  $total_results;
    $result['error'] =  false;
    return $result;
}
   
}

function getrecipesByTeacher(int $limit, $teacher_id,  $DBconn){
 
    try {
        $sql = 'SELECT  * FROM recipes 
         INNER JOIN users  ON recipes.teacher_id = users.user_id
         LEFT JOIN categories  on recipes.category_id = categories.category_id
         where teacher_id = :teacher_id
         ';
        $stmt = $DBconn->prepare($sql);
        $stmt->execute([':teacher_id' =>  $teacher_id]);
        $resultDB = $stmt->fetchAll();
    
        $total_stmt = $DBconn->prepare("SELECT COUNT(*) as total FROM recipes");
        $total_stmt->execute();
        
        $total_results = $total_stmt->fetch(PDO::FETCH_ASSOC)['total'];
        $total_pages = ceil($total_results / $limit);
    
        $result['data']  =  $resultDB;
        $result['total'] =  $total_results;
        $result['error'] =  true;
        return $result;
    } catch (\Throwable $th) {

        $result['data']  =  $th;
        $result['total'] =  $total_pages;
        $result['error'] =  false;
        return $result;
    }
}

function getrecipesById(int $limit, $recipes_id,  $DBconn){
   
    try {
        $sql = 'SELECT  * FROM recipes 
        INNER JOIN users  ON recipes.teacher_id = users.user_id
        where recipes_id = :recipes_id';
        $stmt = $DBconn->prepare($sql);
        $stmt->execute([':recipes_id' =>  $recipes_id]);
        $resultDB = $stmt->fetchAll();
    
        $total_stmt = $DBconn->prepare("SELECT COUNT(*) as total FROM recipes");
        $total_stmt->execute();
        $total_results = $total_stmt->fetch(PDO::FETCH_ASSOC)['total'];
        $total_pages = ceil($total_results / $limit);
    
        $result['data']  =  $resultDB;
        $result['total'] =  $total_pages;
        $result['error'] =  true;
        return $result;
    } catch (\Throwable $th) {

        $result['data']  =  $resultDB;
        $result['total'] =  $total_pages;
        $result['error'] =  false;
        return $result;
    }
}

function getrecipesByCategory(int $limit, $category_id,  $DBconn){

  
    try {
        $sql = 'SELECT  * FROM categories 
        INNER JOIN recipes  ON categories.recipes_id = recipes.recipes_id
        where category_id = :category_id';
        $stmt = $DBconn->prepare($sql);
        $stmt->execute([':category_id' =>  $category_id]);
        $resultDB = $stmt->fetchAll();
    
        $total_stmt = $DBconn->prepare("SELECT COUNT(*) as total FROM recipes");
        $total_stmt->execute();
        $total_results = $total_stmt->fetch(PDO::FETCH_ASSOC)['total'];
        $total_pages = ceil($total_results / $limit);
    
        $result['data']  =  $resultDB;
        $result['total'] =  $total_pages;
        $result['error'] =  true;
        return $result;
    } catch (\Throwable $th) {

        $result['data']  =  $resultDB;
        $result['total'] =  $total_pages;
        $result['error'] =  false;
        return $result;
    }
}


function createrecipes( $requestBody, $DBconn){

 
    try {
        $sql = 'INSERT into recipes (title, description, category_id, teacher_id , img_url, paid, video_url) 
        Value (:title, :description, :category_id, :teacher_id , :img_url, :paid, :video_url)';
        $stmt = $DBconn->prepare($sql);
        $stmt->execute($requestBody);
        $resultDB = $stmt->fetchAll();
    
        $result['data']  =  $resultDB;
        $result['error'] =  true;
        return $result;
    } catch (\Throwable $th) {

        $result['data']  =  null;
        $result['error'] =  false;
        return $result;
    }
}

function deletrecipes( $recipes_id, $DBconn){

    try {
        $sql =  "DELETE FROM recipes WHERE recipes_id = :recipes_id";
        $stmt = $DBconn->prepare($sql);
        $stmt->execute($recipes_id);
        $resultDB = $stmt->fetchAll();
    
        $result['data']  =  $resultDB;
        $result['error'] =  true;
        return $result;
    } catch (\Throwable $th) {

        $result['data']  =  null;
        $result['error'] =  false;
        return $result;
    }
}

function editrecipes( $requestBody, $DBconn){

    $result = null;

    try {
        $sql = 'UPDATE  recipes SET 
        title = :title, 
        description = :description, 
        category_id = :category,  
        img_url = :img_url,
        paid = :paid, 
        video_url  = :video_url
         WHERE recipes_id = :recipes_id';;
        $stmt = $DBconn->prepare($sql);
        $stmt->execute($requestBody);
        $resultDB = $stmt->fetchAll();
    
        $result['data']  =  $resultDB;
        $result['error'] =  true;
        return $result;
    } catch (\Throwable $th) {

        $result['data']  =  null;
        $result['error'] =  false;
        return $result;
    }
}
?>