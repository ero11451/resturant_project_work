<?php 

        include('../api/DBconnect.php');
        $chef_id = $_SESSION["user_id"];
        $chef_name = $_SESSION["username"] ;
        $uploadDir = 'uploads/';
            

        $titleErr =  $disciptionErr = "";
        $img_url = $title = $disciption =  "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["title"])) {
          $titleErr = "Title is required";
        } else {
          $title = test_input($_POST["title"]);
        }

        if (empty($_POST["disciption"])) {
            $disciptionErr= "Disciption is required";
        } else {
              $disciption = test_input($_POST["disciption"]);
        }
 
          $fileName = $uploadDir . basename($_FILES["file"]["name"]);
          

            if(move_uploaded_file($_FILES["file"]["tmp_name"], $fileName)) {
               $img_url = $fileName;
               echo "File successfully uploaded $fileName";
            }else{
              echo "there was an error with the file";
            }
          
    
              $sqlInsart = "INSERT INTO recipeTesting (title, disciption, img_url, chef_id, chef_name) VALUES ('$title', '$disciption','$img_url', $chef_id, '$chef_name')";
            
              if ( $connection->query($sqlInsart)  === TRUE) {
                  echo "item created successfully";
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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >

<?php include "../component/header.php"?>


<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="bg-white rounded-xl shadow p-4 sm:p-7 ">
    <div class="mb-8">
      <h2 class="text-xl font-bold text-gray-800 ">
        Add recipe
      </h2>
      <p class="text-sm text-gray-600 ">
       This recipe is created by <?php echo  $_SESSION["username"]; ?>
      </p>
    </div>


    <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
        <div class="sm:col-span-3">
          <label class="inline-block text-sm text-gray-800 mt-2.5">
            Recipe photo
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
        <input type="file"  name="file" id="file"
              class="block w-full text-sm mb-3 text-gray-500
                    file:me-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-600 file:text-white
                    hover:file:bg-blue-700
                    file:disabled:opacity-50 file:disabled:pointer-events-none
                  "
         >
        </div>
        <!-- End Col -->

        <div class="sm:col-span-3">
          <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 0">
           Title
          </label>
       
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <div class="sm:flex">
            <input id="af-account-full-name" type="text"
            
            name="title"
            class="py-2 px-3 pe-11 block w-full border-gray-200 bg-gray-100 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
             placeholder="Write the title of the recipe">
           </div>
        </div>
   

        <div class="sm:col-span-3">
          <label for="af-account-bio" class="inline-block text-sm text-gray-800 mt-2.5 ">
            Discription
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-9">
          <textarea id="af-account-bio" name='disciption' class="bg-gray-100  py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none " rows="6" placeholder="Type your message..."></textarea>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Grid -->

      <div class="mt-5 flex justify-end gap-x-2">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none ">
          Cancel
        </button>
        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none ">
          Save changes
        </button>
      </div>
    </form>
  </div>
  <!-- End Card -->
</div>
<!-- End Card Section -->
</body>
</html>