<?php 

$host = "localhost";
$user = "root";
$pwd = "";
$dbname = "image_db";
$conn = new mysqli($host, $user, $pwd, $dbname);


$id = $_GET['imgid'];

$data = $conn->query("SELECT * FROM images WHERE id = $id");

// echo "<pre>";
// print_r($data->fetch_assoc());
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
    <br><br><br>

     <?php 
        while ($row = $data->fetch_assoc())
        {
     ?>
        <div class="images">
            <img width="40%" src="uploads/<?= $row['file_name'] ?>" alt="" srcset="">
         
            <h3><?= $row['title'] ?></h3> 
            
        </div>
      <?php 
         }
      ?>  
  
</body>
</html>
