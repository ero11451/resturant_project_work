<?php

include('DBconnect.php');

$user_id = $_SESSION["user_id"];
header('Content-Type:application/json');
$response = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $request_body = json_decode(file_get_contents('php://input'), true);
    $recipe_id  =   $request_body['recipe_id'];
    $sql =  "DELETE FROM recipeTesting WHERE id =  $recipe_id";
    $result = $connection->query($sql);

    if ($result) {
        $response['status'] = 200;
        $response['message'] = 'successful';
        $response['data'] = null;
    } else {
        $response['status'] = 404;
        $response['message'] = 'was not able to delete successfully';
        // echo json_encode("there was an error");
    }
} else {
    $response['status'] = 404;
    $response['message'] = 'unsuccessful';
    $response['data'] = null;
}

echo json_encode($response);
