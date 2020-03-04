<?php 

session_start();
include __DIR__."/../config.php";


include($base_path ."helpers/dump.php");
include($base_path ."classes/DB.php");

$db = new DB;

if(isset($_POST['submit']))
{
    $name = $_POST['c_name'];
    $number = $_POST['c_number'];
    $image = $_FILES['c_image'];
    $status = $_POST['c_status'];

    // dd($image);

    $_SESSION['name_value'] = $name ;
    $_SESSION['number_value'] = $number ;

    if(empty($name) || $name == null)
    {
       $_SESSION['error_name'] = "Name field cannot be empty." ;
       header('location: create.php');
       exit;
      
    }

    if(empty($number) || $number == null)
    {
        $_SESSION['error_number'] = "Number field cannot be empty." ;
        header('location: create.php');
        exit;
    }
    // dd($image);

    if( !empty($image['name']) )
    {
       $exp = explode('.', $image['name']);
       $ext = strtolower(end($exp));
       $new_name = time().'.'.$ext;
       
       $path = $base_path."uploads/".$new_name;

       move_uploaded_file($image['tmp_name'],  $path);
    }
    else 
    {
        $new_name = null; 
    } 



    $sql = "INSERT INTO contacts(c_name, c_number, c_image, c_status) VALUES('$name', '$number', '$new_name', '$status')";

    if($db->insert($sql))
    {
        $_SESSION['contact_success'] = "New contact created successfully.";
        header("location: ../contacts.php");
        exit;
    }





}
else 
{
    header('location: create.php');
}