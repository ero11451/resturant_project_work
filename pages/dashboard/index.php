<?php
include('../../api/DBconnect.php');
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

<body class="bg-gray-50 ">

  <?php include('sidebar.php') ?>

  <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">

    <?php include('header.php') ?>
    <div id="recipeList">
      <?php include('recipeList.php') ?>
    </div>
    <!-- <div id='createRecipe'>
    </div> -->
  </div>



  <script>
    // let currentPage = 'recipeList'

    // var recipeListElement = document.getElementById('recipeList');
    // var createRecipeElement = document.getElementById('createRecipe');
    // createRecipeElement.style.display = "none";

    // function myFunction(moveTo) {
    //   currentPage = moveTo
    //   if ('recipeList' ==  moveTo) {
    //     recipeListElement.style.display = "block";
    //   } else {
    //     recipeListElement.style.display = "none";
    //   }
    //   if ('createRecipe' ==  moveTo) {
    //     createRecipeElement.style.display = "block";
    //   } else {
    //     createRecipeElement.style.display = "none";
    //   }
    // }
  </script>

</html>