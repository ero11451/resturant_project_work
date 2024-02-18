<?php 

    // include './DBconnect.php';

    include('DBconnect.php');

    $sql = "SELECT * FROM recipeTesting JOIN users ON users.id = recipeTesting.chef_id";

    $result = $connection->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
         $data[] = $row;
      }
    } else {
       header('Content-Type:application/json');
       echo json_encode("there was an error");
    }

    header('Content-Type:application/json');
    echo json_encode($data); 

?>