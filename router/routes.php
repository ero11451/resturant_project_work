<?php 


use Bramus\Router\Router;

$router = new Router();

include(basePath('router/middleware.php'));



$router->match('GET|POST', '/login', function( ){
    loginController();
});

$router->match('GET|POST', '/register', function( ){
    registerController();
});

$router->before('GET|POST', '/', function() {
  if (!isset($_SESSION['user'])) {
      header('location: /login');
      exit();
  }
});
$router->before('GET|POST', '/home', function() {
    if (!isset($_SESSION['user'])) {
        header('location: /login');
        exit();
    }
  });

$router->get('/', function( ){
    homeIndex();
});

$router->get('/home', function( ){
    homeIndex();
});
$router->get('/home/(\w+)', function($id){
   
    lessonsDetails($id);
});
$router->get('/logout', function( ){
    session_destroy();
    header("Location: login");
});


$router->get('/lessons/delete/(\w+)', function($id) {
  $lessons_id = htmlentities($id);
  lessonsDelete($lessons_id);
});

$router->match('GET|POST', '/lessons', function() {
    lessonsIndex();
});

$router->match('GET|POST', '/lessons/create', function() {
  createLessons();
 });
 
$router->get('/about', function() {
    echo 'About Page';
});

$router->set404(function() {
    echo ' Page not found';
});

// $router->post('/register', function( ){
//     registerController();
// });
// $router->get('/lessons/{id}', function() {
//   lessonsIndex();
// });

// $router->get('/lessons/create', function() {
//     createLessons();
// });

// $router->post('/lessons/create', function() {
//     createLessons();
// });
// $router->post('/login', function( ){
//     loginController();
// });



$router->run();
