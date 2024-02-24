<?php

// include './DBconnect.php';

include('DBconnect.php');
header('Content-Type:application/json');
$response = [];

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
   $sql = "SELECT * FROM recipeTesting JOIN users ON users.id = recipeTesting.chef_id ";
   $result = $connection->query($sql);

   if  ($result->num_rows > 0){

      $response['status'] = 200;
      $response['message'] = 'successful';
      while($row = $result->fetch_assoc()) { 
          $response['data'][] = $row; 
      }
   }else{
      $response['status'] = 200;
      $response['message'] = 'There was no data found';
      $response['data'] = null;
}
   # code...
}


// if ($result->num_rows > 0) {
//    while ($row = $result->fetch_assoc()) {
//       $data[] = $row;
//    }
// } else {
//    echo json_encode("there was an error");
// }
// header('Content-Type:application/json');


echo json_encode($response);
