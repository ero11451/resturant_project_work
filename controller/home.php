<?php

 


    function homeIndex() {
 
            require(basePath('db/connection.php'));

           
            $users = query( 'SELECT * FROM users ', [], $conn );;
            $lessons = query( 'SELECT * FROM lessons ', [], $conn );
            $categories = query( 'SELECT * FROM categories ', [], $conn );;

            loadView('home', ['users' => $users, 'categories' => $categories,'lessons' => $lessons ]);
        }
  
    