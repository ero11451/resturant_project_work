<?php 


function usersDelete($id)
{
    require(basePath('db/connection.php'));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    $dbRes =   query(
        "DELETE FROM recipes WHERE users = :users_id ",
        ['users_id' => $id],
        $conn
    );

    if (!$dbRes) {
        loadView('component/notification', ['message' => 'Deleted successfully',  'type' => 'success']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        loadView('component/notification', ['message' => 'There was an error in this request.',  'type' => 'error']);
    }
}
