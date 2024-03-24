<?php

     $imageUrl;
     $uploadDir = 'uploads/';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        if (isset($_FILES["file"])){
            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                  $fileName = uniqid() . '_' . basename($_FILES["file"]["name"]);
                  $targetPath = $uploadDir . $fileName;
                  if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
                      $imageUrl = $targetPath;
                      echo "File uploaded successfully. File path: " . $targetPath;
                  } else {
                      echo "Error moving the uploaded file.";
                  }
              } else {
                  echo "Error during file upload. Error code: " . $_FILES["file"]["error"];
              }
              }
            else{
              echo 'Error : files key not set';
            }

  
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p><?=  $imageUrl  ?> this is image</p>
   <img src="<?=  $imageUrl  ?>" alt="" srcset="">
  
</body>
</html>