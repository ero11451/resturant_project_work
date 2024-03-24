<?php
  $errorMessage;
  $validated = false;

function login($reqbody){

    if (empty($reqbody["password"])) {
        $errorMessage['password'] = "Password is required";
        $validated = false;
      } else { $validated = true; }

    if (empty($reqbody["username"])) {    
        $validated = false;
        $errorMessage['username'] = "Username is required";
    
      }{ $validated = true;}
      
      if($validated){
        $password  = validat_input($reqbody["password"]);
        $username  = validat_input($reqbody["username"]);

        $sql = 'SELECT * FROM users where username= :username';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();
        if (!$user){
          $errorMessage['username'] = "Username not valid";
        }
        if ($user){
            $checkPassword = (bool) password_verify( $password, $user['password']);
            if (!$checkPassword){ 
                  $errorMessage['password'] = "Password not valid";
              }else{

                $_SESSION["user"] = $user;
                header('Location: home.php');
              }
        }
    }
}

?>