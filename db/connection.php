<?php


$servername = "localhost";
$username = "root";
$password = "";
$conn;

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE  IF NOT EXISTS  benin";
  $conn->exec($sql);

  $conn->exec("USE benin");
  
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}




 


 function query($sql , $params , $conn){
  try{
    $stmt =  $conn->prepare($sql);
  
     $stmt->execute($params);
    
    return $stmt ->fetchAll(PDO::FETCH_ASSOC);

  }catch(PDOException $e) {
    echo '<pre>' . "<br>" . $e->getMessage() . '</pre>';
  }
}


  

