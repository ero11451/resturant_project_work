<?php

include (basePath('controller/index.php'));
include (basePath('router/Router.php'));
include (basePath('router/middleWare.php'));

// $homeController = new HomeController();
// $authController = new Auth();



// $router->get( '/' , $authController->index());
// $router->get( '/home' , $homeController->index());
// $router->get( '/login' , $authController->index());
// $router->post( '/login' , 'controller/register.php');
// $router->get( '/about' , 'controller/register.php');
// $router->get( '/register' , 'controller/register.php');
// $router->get( '/lessons' , 'controller/lessonsList.php');



$authHandler1 = new AuthHandler1();
$authHandler2 = new AuthHandler2();

$router = new Router();


$router->addRoute('/home', function() {
  loadView('auth/login');
}, 'GET');

$router->addRoute('/home/create', function() {
    var_dump( $_POST);
    // loadView('auth/signup');
  }, 'POST');


$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$router->dispatch($requestUri, $requestMethod);


?>