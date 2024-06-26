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
$router->get('/index', function( ){
    if (isset($_SESSION['user'])) {
        header('location: /home');
        exit();
    }
    loadView('index');
});

$router->get('/', function( ){
    loadView('index');
});

$router->get('/loadDetailData', function( ){
    require(basePath('db/connection.php'));
    initalTableSetup($conn);
    initalValueSetup($conn);

    header('location: /home');
});

$router->get('/home', function( ){
    homeIndex();
});

$router->get('/user/delete/(\w+)', function($id ){
    $id = htmlentities($id);
    usersDelete($id);
});

$router->get('/home/(\w+)', function($id){
    recipesDetails($id);
});



$router->get('/recipes/(\w+)', function($id){
    recipesDetails($id);
});

$router->get('/logout', function( ){
    session_destroy();
    header("Location: login");
});



$router->get('/about', function( ){
   loadView('about');
});

$router->get('/contact_us', function( ){
    loadView('contact_us');
 });

$router->get('/recipes/delete/(\w+)', function($id) {
  $recipes_id = htmlentities($id);
  recipesDelete($recipes_id);
});

$router->match('GET|POST', '/recipes', function() {
    recipesIndex();
});

$router->match('GET|POST', '/recipes/mode/(\w+)', function($mode) {
    $mode = htmlentities($mode);
    if ($mode == 'create') {
        createrecipes();
    }
    if ($mode =='update') {
        updaterecipes();
    }
 });


$router->set404(function() {
    loadView('error');
    // echo ' Page not found';
});

// $router->get('/about', function() {
//     echo 'About Page';
// });


// $router->post('/register', function( ){
//     registerController();
// });
// $router->get('/recipes/{id}', function() {
//   recipesIndex();
// });

// $router->get('/recipes/create', function() {
//     createrecipes();
// });

// $router->post('/recipes/create', function() {
//     createrecipes();
// });
// $router->post('/login', function( ){
//     loginController();
// });



$router->run();
