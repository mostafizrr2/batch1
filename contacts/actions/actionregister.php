<?php 

session_start();
include __DIR__."/../config.php";


include($base_path ."helpers/dump.php");
include($base_path ."classes/DB.php");

$db = new DB;

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $_SESSION['name_value'] = $name ;
    $_SESSION['email_value'] = $email ;

    if(empty($name) || $name == null)
    {
       $_SESSION['error_name'] = "Name field cannot be empty." ;
       header('location:'. $host . 'register.php');
        exit;
    }

    if(empty($email) || $email == null)
    {
        $_SESSION['error_email'] = "Email field cannot be empty." ;
        header('location: '. $host . 'register.php');
        exit;
    }

    if(empty($password) || $password == null)
    {
        $_SESSION['error_password'] = "Password field cannot be empty." ;
        header('location: '. $host . 'register.php');header('location: '. $host . 'register.php');
        exit;
    }

    $password = sha1($password);

    $sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";

    if($db->insert($sql))
    {
        $_SESSION['success_register'] = "Your account created successfully. please try to login with your credentials." ;
        header('location: '. $host . 'login.php');
    }



}
else 
{
    die('404 not found');
}