<?php 

$host = "localhost";
$user = "root";
$pwd = "";
$dbname = "image_db";

$conn = new mysqli($host, $user, $pwd, $dbname);

$data = $conn->query("SELECT * FROM images ORDER BY id DESC");

// echo "<pre>";
// print_r($data);
// die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
     <a href="index.php">Upload image</a>
    <br><br>
    <?php 
       if($data->num_rows > 0)
       {

         while($img = $data->fetch_assoc())
         {
    ?>
        <div class="images">
            <img width="100px" src="uploads/<?= $img['file_name'] ?>" alt="" srcset="">
            <a href="single-img.php?imgid=<?= $img['id'] ?>">
              <h3><?= $img['title'] ?></h3> 
            </a>
        </div><hr>

    <?php
         } //While
       } //If
       else 
       {

    ?>
        <h1>No images found</h1>
    <?php

       }
    ?>


</body>
</html>
