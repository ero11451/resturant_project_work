<?php 
 
  include 'DBconnect.php';


  $emailErr = $user_typeErr =  $passwordErr = $usernameErr = "";
  $email = $user_type = $username = $password = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["username"])) {
        $usernameErr = "User Name is required";
      } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
          $username = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["password"])) {
        $passwordErr= "Password is required";
      } else {
        $password = test_input($_POST["password"]);
      }
        
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      if (empty($_POST["user_type"])) {
        $user_typeErr = "User type is required";
      } else {
        $user_type = test_input($_POST["user_type"]);
      }

      $hashPassword =  password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO users (user_type, username, email, user_password) VALUES ('$user_type', '$username', '$email', '$hashPassword')";

      if ( $connection->query($sql)  === TRUE) {

        $sqlGetUser = "SELECT * FROM users WHERE email = '$email'";
        $result =   $connection->query($sqlGetUser);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $_SESSION["user_id"]  = $row["id"];
            $_SESSION["user_type"]  = $row["user_type"];
            $_SESSION["username"]  =  $row["username"];
            $_SESSION["email"]  =$row["email"];
          }
          header('Location: home.php');
        } else {
          echo "0 results";
        }
        } else {
          echo "Error: " . $sql . "<br>" . $connection->error;
        }

      }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

  <body class="bg-gray-100 flex h-full items-center py-16">
    <main class="w-full max-w-md mx-auto p-6">
      <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm ">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800 ">Sign up</h1>
       
          </div>

          <div class="mt-5">
        

            <!-- Form -->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class="grid gap-y-4">
                <!-- Form Group -->
                <div>
                  <label for="email" class="block text-sm mb-2 ">Email address</label>
                  <div class="relative">
                    <input type="email" id="email" name="email" 
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                       
                    required aria-describedby="email-error">
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                      <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                    </div>
                  </div>
                  <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p>
                </div>
                <!-- End Form Group -->

                <div>
                  <label for="userame" class="block text-sm mb-2 ">User name</label>
                  <div class="relative">
                    <input type="text" id="username" name="username" 
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"                   required aria-describedby="email-error">
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                      <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                    </div>
                  </div>
                  <p class="hidden text-xs text-red-600 mt-2" id="email-error">
                  <span class="error">* <?php echo $usernameErr;?></span>
                  </p>
                </div>
                <!-- Form Group -->
                <div>
                  <div class="flex justify-between items-center">
                    <label for="password" class="block text-sm mb-2 ">Password</label>
                    </div>
                  <div class="relative">
                    <input type="password" id="password" name="password" 
                       class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      required aria-describedby="password-error">
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                      <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                    </div>
                  </div>
                  <p class="hidden text-xs text-red-600 mt-2" id="password-error">
                  <span class="error">* <?php echo $passwordErr;?></span>
                  </p>
                </div>


                <div>
                  <label for="userType" class="block text-sm mb-2 ">User type</label>
                  <div class="relative">
                    <select  name="user_type" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  required aria-describedby="email-error">
                      <option value="chef">Chef</option>
                      <option value="user">User</option>
                    </select>
                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                      <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                    </div>
                  </div>
                  <p class="hidden text-xs text-red-600 mt-2" id="email-error">
                     <span class="error">* <?php echo $user_typeErr;?></span>
                  </p>
                </div>

                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm
                 font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700
                  disabled:opacity-50 disabled:pointer-events-none">Submit</button>
        
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400  text-center">
                  Don't have an account yet?
                  <a class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="./signup.html">
                    Sign up here
                  </a>
                </p>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
      </div>
    </main>
  </body>

<script src="./node_modules/preline/dist/preline.js"></script>
</html>