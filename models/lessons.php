<?php



 require_once '../db/connection.php';
 
function getLessons(  ){

try {
    $sql = 'SELECT  * FROM lessons  ';
    $stmt = $DBconn->prepare($sql);
    $stmt->execute();
    $resultDB = $stmt->fetchAll();

    $total_stmt = $DBconn->prepare("SELECT COUNT(*) as total FROM lessons");
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

function getLessonsByTeacher(int $limit, $teacher_id,  $DBconn){
 
    try {
        $sql = 'SELECT  * FROM lessons 
         INNER JOIN users  ON lessons.teacher_id = users.user_id
         LEFT JOIN categories  on lessons.category_id = categories.category_id
         where teacher_id = :teacher_id
         ';
        $stmt = $DBconn->prepare($sql);
        $stmt->execute([':teacher_id' =>  $teacher_id]);
        $resultDB = $stmt->fetchAll();
    
        $total_stmt = $DBconn->prepare("SELECT COUNT(*) as total FROM lessons");
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

function getLessonsById(int $limit, $lessons_id,  $DBconn){
   
    try {
        $sql = 'SELECT  * FROM lessons 
        INNER JOIN users  ON lessons.teacher_id = users.user_id
        where lessons_id = :lessons_id';
        $stmt = $DBconn->prepare($sql);
        $stmt->execute([':lessons_id' =>  $lessons_id]);
        $resultDB = $stmt->fetchAll();
    
        $total_stmt = $DBconn->prepare("SELECT COUNT(*) as total FROM lessons");
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

function getLessonsByCategory(int $limit, $category_id,  $DBconn){

  
    try {
        $sql = 'SELECT  * FROM categories 
        INNER JOIN lessons  ON categories.lessons_id = lessons.lessons_id
        where category_id = :category_id';
        $stmt = $DBconn->prepare($sql);
        $stmt->execute([':category_id' =>  $category_id]);
        $resultDB = $stmt->fetchAll();
    
        $total_stmt = $DBconn->prepare("SELECT COUNT(*) as total FROM lessons");
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


function createLessons( $requestBody, $DBconn){

 
    try {
        $sql = 'INSERT into lessons (title, description, category_id, teacher_id , img_url, paid, video_url) 
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

function deletLessons( $lessons_id, $DBconn){

    try {
        $sql =  "DELETE FROM lessons WHERE lessons_id = :lessons_id";
        $stmt = $DBconn->prepare($sql);
        $stmt->execute($lessons_id);
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

function editLessons( $requestBody, $DBconn){

    $result = null;

    try {
        $sql = 'UPDATE  lessons SET 
        title = :title, 
        description = :description, 
        category_id = :category,  
        img_url = :img_url,
        paid = :paid, 
        video_url  = :video_url
         WHERE lessons_id = :lessons_id';;
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