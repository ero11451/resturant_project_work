<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$DBconn;

try {
  
  $DBconn = new PDO("mysql:host=$servername", $username, $password);
  $DBconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $createSql = "CREATE DATABASE  IF NOT EXISTS  learing_db";
  $DBconn->exec($createSql);

  $DBconn->exec("USE learing_db");

} catch(PDOException $e) {
  echo '<pre>' . $createSql . "<br>" . $e->getMessage() . '</pre>';
}

?>

