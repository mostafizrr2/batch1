<?php 


include "./classes/dump.php";
include "./classes/sec.php";
include "./classes/DB.php";

$db = new DB();

if(isset($_POST['submit']))
{

    $title = $_POST['title'];

    // $title = sec($title);


    $file = $_FILES['image'];

    // dd( $title);


    if( empty($file['name']) || empty($title) )
    {
        header('location: index.php');
        exit;
    }
    
  
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];


    $xpd = explode('.', $file_name);
    $ext = strtolower( end($xpd) );
    $new_name = time() . "." . $ext;

   
    $sql = "INSERT INTO images(file_name, title) VALUES('$new_name', '$title')";
    

    if( $db->insert($sql) )
    {
        move_uploaded_file($file_tmp, 'uploads/'. $new_name);
        
        header("location: index.php");
        
        exit;  
    } 
    else 
    {
        echo "Error! Uploadation failed.";  
    }

}