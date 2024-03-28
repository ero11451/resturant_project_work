<?php

session_start();

require('vendor/autoload.php');
require('./utility/index.php');

require(basePath('controller/index.php'));

use Bramus\Router\Router;

$router = new Router();

function authMiddleware($router) {
    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        echo '401 - Unauthorized';
        exit();
    }
}

// $router->before('GET', 'home', 'authMiddleware', [$router ]);

$router->get('/login', function( ){
    loginController();
});

$router->post('/login', function( ){
    loginController();
});
$router->get('/register', function( ){
    registerController();
});
$router->get('/logout', function( ){
    session_destroy();
    header("Location: logina");
});

$router->post('/register', function( ){
    registerController();
});
$router->get('/', function( ){
    homeIndex();
});

$router->get('/home', function( ){
    homeIndex();
});

$router->get('/lessons', function() {
    lessonsIndex();
});

$router->get('/lessons/create', function() {
    createLessons();
});
$router->post('/lessons/create', function() {
    createLessons();
});


$router->get('/about', function() {
    echo 'About Page';
});

$router->set404(function() {
    echo ' Page not found';
});


$router->run();
