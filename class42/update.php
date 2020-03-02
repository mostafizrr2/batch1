<?php 

include "./classes/dump.php";
include "./classes/DB.php";
$db = new DB();

 if(isset($_POST['submit']))
 {
     $id = $_POST['id'];
     $title = $_POST['title'];

     $file_name = $_FILES['image']['name'];
     $file_size = $_FILES['image']['size'];
     $file_tmp = $_FILES['image']['tmp_name'];
 
     $xpd = explode('.', $file_name);
     $ext = strtolower( end($xpd) );
     $new_name = time() . "." . $ext;


    $sql0 = "SELECT * FROM images WHERE id = $id";
    $image = $db->getData($sql0);

    $row = $image->fetch_assoc();

    // dd(file_exists('uploads/'. $row['file_name']));

    
    if(file_exists('uploads/'. $row['file_name']))
    {
        unlink('uploads/'. $row['file_name']);
    }
    // else 
    // {
    //     die("no file exits in folder");
    // }

     $sql = "UPDATE images SET title='$title', file_name='$new_name' WHERE id = '$id' ";

     if( $db->update($sql))
     {
        move_uploaded_file($file_tmp, 'uploads/'. $new_name);
        header('location: single-img.php?imgid='. $id);    
     }

 }