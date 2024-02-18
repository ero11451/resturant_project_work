<?php 

$connection = mysqli_connect('localhost','admin', 'password', 'job_project');
if (!$connection) {
 echo "db not connected successfully" ;
}

session_start();

?>