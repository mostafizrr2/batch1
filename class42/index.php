<?php
error_reporting(E_ALL);


include "./classes/dump.php";
include './classes/DB.php';

$db = new DB();
$sql = "SELECT * FROM images ORDER BY id DESC";
$images = $db->getData($sql);


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <br>
    <a href="upload.php">Upload image</a>
    <br><br>

    <div class="container">
        <div class="row">
            <?php
            if ($images->num_rows > 0) {

                while ($img = $images->fetch_assoc()) {
            ?>
                <div class="col-md-4">
                    <div class="images">
                        <img width="100%" class="img-thumbnail" src="uploads/<?= $img['file_name'] ?>" alt="" srcset="">
                        <br>
                        <a href="single-img.php?imgid=<?= $img['id'] ?>">
                            <p><?= $img['title'] ?></p>
                        </a>
                        <a onclick="return confirm('Are you sure to delete this?');" 
                            class="btn btn-danger btn-sm" 
                            href="delete.php?imgid=<?= $img['id'] ?>"
                        >Delete</a>
                        <a class="btn btn-info btn-sm" 
                            href="edit.php?imgid=<?= $img['id'] ?>"
                        >Edit</a>
                    </div>
                </div>            
            <?php
                } //While
            } //If

            else {

            ?>
                <h1>No images found</h1>

            <?php

            }
            ?>
        </div>
    </div>

</body>

</html>