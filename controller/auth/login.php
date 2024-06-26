<?php
require basePath('vendor/autoload.php');

use Respect\Validation\Validator as v;


function loginController()
{

  require(basePath('db/connection.php'));

  initalValueSetup($conn);
  $username = $password = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username =  $_POST['username'];
    $password =  $_POST['password'];

    $isValid =  v::notEmpty()->validate($username) &&  v::notEmpty()->validate($password);

    if ($isValid){
      $user = query( 'SELECT * FROM users where username= :username', ['username' => $username], $conn );

      if ($user ) {
         $checkPassword = (bool) password_verify($password, $user[0]['password']);
  
        if (!$checkPassword &&  !$user ){ 
          loadView('component/notification', [ 'message' => 'Invalid user credentials',  'type' => 'error' ]);
          }
        else{
            $userAuth = $user[0];
            $_SESSION["user"] = $user[0];
            if( $userAuth['user_type'] == 'user'){
              header('Location: recipes');
            }
            else{
              header('Location: home');
            }
          }
      }else{
        loadView('component/notification', 
        ['message' => 'Invalid user credentials',  
        'type' => 'error' ]);
      }
  }else{
         loadView('component/notification', ['message' => 'Invalid user credentials',  'type' => 'error' ]);
  }

  return loadView('auth/login');
}

  return loadView('auth/login');

}



