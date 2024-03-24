<?php 

  require_once '../models/lessons.php';
  include('../db/connection.php');

  function get_lessons(){
     return getLessons($DBconn);
  }
  

?>