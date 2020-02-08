<?php 

spl_autoload_register(function($className){
    include "classes/" . $className . ".php";
});

if(isset($_POST['submit']))
{
     $number = $_POST['number'];
     $message = $_POST['message'];
     
     $messageFrom = $_POST['messagefrom'];

     if($messageFrom == 'student')
     {
        $obj = new Student($number,$message);
        $obj->sendMessage();
        
     }
     else if($messageFrom == 'teacher')
     {
        $obj = new Teacher($number,$message);
        $obj->sendMessage();
     }
     else 
     {
        $obj = new School($number,$message);
        $obj->sendMessage();
     }

     header('location: success.php');
}
else 
{
    header('location: index.php');
}

