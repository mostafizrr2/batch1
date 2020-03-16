<?php 

session_start();
include __DIR__."/../config.php";


include($base_path ."helpers/dump.php");
include($base_path ."classes/DB.php");

$db = new DB;

if(isset($_POST['submit']))
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['email_value'] = $email ;


    if(empty($email) || $email == null)
    {
        $_SESSION['error_email'] = "Email field cannot be empty." ;
        header('location: '. $host . 'register.php');
        exit;
    }

    if(empty($password) || $password == null)
    {
        $_SESSION['error_password'] = "Password field cannot be empty." ;
        header('location: '. $host . 'login.php');
        exit;
    }

    $password = sha1($password);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $user = $db->getData($sql);


    if( $user->num_rows > 0 )
    {
        
        while($u = $user->fetch_assoc())
        {
            $_SESSION['user_id'] = $u['id'];
            $_SESSION['name'] = $u['name'];
            $_SESSION['email'] = $u['email'];
        }
    
        header('location: '. $host . 'profile.php');
        exit;

    }
    else 
    {
        $_SESSION['no_user'] = "Incorrect email or password.";
        header('location: '. $host . 'login.php');
        exit;
    }



}
else 
{
    die('404 not found');
}