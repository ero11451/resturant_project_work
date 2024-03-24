<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
 
    session_unset();
    session_destroy();
    header('Location: home.php');
}
// $_SESSION = array();
// destroy the session

?>