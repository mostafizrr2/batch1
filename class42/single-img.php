<?php 

include "./classes/dump.php";
include './classes/DB.php';

$db = new DB();

$id = $_GET['imgid'];

$sql = "SELECT * FROM images WHERE id = $id";

$image = $db->getData($sql);

if($image->num_rows < 1)
{
    die("No image found.");
}
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
        while ($row = $image->fetch_assoc())
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
