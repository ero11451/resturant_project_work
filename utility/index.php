<?php

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function basePath($path)
{
  return  dirname(__DIR__) . '/' . $path;
}

function loadView($name, $data = [])
{
  echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body >
';
  $viewPath =  basePath("views/{$name}.php");

  if (file_exists($viewPath)) {
    extract($data);
    require  $viewPath;
  } else {
    require basePath("views/error.php");
  }

  echo '
    </body>
    </html>';
}

function loadComponent($name, $data = [])
{

  $viewPath =  basePath("views/component/{$name}.php");

  if (file_exists($viewPath)) {
    extract($data);
    require $viewPath;
  } else {
    echo 'Component' . $name . ' does not exist';
  }
}

function print_data($data)
{
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
}

