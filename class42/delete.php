<?php 
include "./classes/DB.php";
include "./classes/dump.php";

$db = new DB();


$id = $_GET['imgid'];

$sql = "SELECT * FROM images WHERE id = $id";
$image = $db->getData($sql);

$row = $image->fetch_assoc();

if(file_exists('uploads/'. $row['file_name']))
{
    unlink('uploads/'. $row['file_name']);
}


$sql2 = "DELETE FROM images WHERE id = $id";
$deleted = $db->delete($sql2);

if($deleted)
{
   header('location: index.php');
   exit;
}
else 
{
    die("Some Wrong......");
}

