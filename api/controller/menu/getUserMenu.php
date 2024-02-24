<?php

include('DBconnect.php');
$user_id = $_SESSION["user_id"];
$response = [];

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
   $sql =  "SELECT * FROM recipeTesting WHERE chef_id = '$user_id'";
   $result = $connection->query($sql);

   if ($result->num_rows > 0) {

      $response['status'] = 200;
      $response['message'] = 'successful';
      while ($row = $result->fetch_assoc()) {
         $response['data'][] = $row;
      }
   } else {
      $response['status'] = 200;
      $response['message'] = 'There was no data found';
      $response['data'] = null;
   }
   # code...
}


echo json_encode($response);
