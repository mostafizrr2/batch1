<?php 
include "./classes/DB.php";
include "./classes/dump.php";

$db = new DB();


$id = $_GET['imgid'];

$sql = "SELECT * FROM images WHERE id = $id";
$image = $db->getData($sql);

$row = $image->fetch_assoc();

$removed =  unlink('uploads/'. $row['file_name']);

if(!$removed)
{
   die("File not deleted from the directory.");
}

$sql2 = "DELETE FROM images WHERE id = $id";
$deleted = $db->delete($sql2);

if($deleted)
{
   header('location: images.php');
   exit;
}
else 
{
    die("Some Wrong......");
}

