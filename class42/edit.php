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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <br><br><br>

     <?php 
        while ($row = $image->fetch_assoc())
        {
     ?>
        <div class="container">
            <form action="update.php" method="post" enctype="multipart/form-data">
               
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <input type="text" name="title" class="form-control" value="<?= $row['title'] ?>"> <br><br>
                <img width="20%" src="uploads/<?= $row['file_name'] ?>" alt="<?= $row['file_name'] ?>" srcset=""><br><br>

                <input type="file" name="image" class="form-input"> <br><br>
                <button type="submit" name="submit"  class="btn btn-primary">Update Now</button>
            </form>
        </div>
      <?php 
         }
      ?>  
  
</body>
</html>
