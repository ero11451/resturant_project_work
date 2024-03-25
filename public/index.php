<?php

require('./../utility/index.php');

$router = [
    '/' => 'controller/login.php',
    '/home' => 'controller/home.php',
    '/about' => 'controller/login.php',
    '/login' => 'controller/login.php',
];

$url = $_SERVER['REQUEST_URI'];

if (array_key_exists($url, $router)) {
   require(basePath($router[$url]));
} else {
   require(loadView('error'));
}





?>