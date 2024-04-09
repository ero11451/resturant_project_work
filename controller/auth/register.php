<?php

require basePath('vendor/autoload.php');

use Respect\Validation\Validator as v;

function registerController()
{
  require(basePath('db/connection.php'));

  $username = $password = $email = $user_type = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $isValid =  v::notEmpty()->validate($_POST["username"]) &&
      v::notEmpty()->email()->validate($_POST["email"]) &&
      v::notEmpty()->validate($_POST["password"]);

    if (!$isValid) {
      loadView('component/notification', ['message' => 'Invalid user credentials', 'type' => 'error']);
      loadView('auth/signup');
    } else {

      $username =  $_POST['username'];  $email =  $_POST['email'];
      $user_type =  $_POST['user_type']; $password =  $_POST['password'];

      $alreadyExit = query(
        'SELECT * FROM users where username= :username and email = :email',
        ['username' => $username, 'email' => $email],
        $conn
      );

      if ((bool) $alreadyExit) {
        loadView('component/notification', ['message' => 'Invalid user credentials', 'type' => 'error']);
        loadView('auth/signup');
      } else {
        $hashPassword =  password_hash($password, PASSWORD_DEFAULT);
        query(
          'INSERT into users (username, password, email, user_type ) 
           Value (:username, :password, :email, :user_type )',
          [
            'username' => $username, 'email' => $email,
            'user_type' => $user_type,  'password' => $hashPassword
          ],
          $conn
        );

      $userData = query(
         'SELECT * FROM users where username= :username',
         ['username' => $username],  $conn  );

        if ($userData) {
          $_SESSION['user'] =  $userData[0];
          $userAuth = $user[0];
          if( $userAuth['user_type'] == 'user'){
            header('Location: recipes');
          }
          else{
            header('Location: home');
          }
        }
      }
    }


    // loadView('auth/signup');
  } else {

    loadView('auth/signup');
  }
}
?>