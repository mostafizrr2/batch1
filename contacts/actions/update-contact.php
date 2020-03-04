<?php 

session_start();
include __DIR__."/../config.php";


include($base_path ."helpers/dump.php");
include($base_path ."classes/DB.php");

$db = new DB;

if(isset($_POST['submit']))
{
    $id = $_POST['id'];

    $sql = "SELECT * FROM contacts WHERE id = $id";
    $contact = $db->getData($sql);

    if($contact->num_rows > 0)
    {
        $file = $contact->fetch_assoc()['c_image'];

        $old_file = $contact->fetch_assoc();

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
    
           if(file_exists($base_path.'uploads/'. $file ))
           {
               unlink($base_path.'uploads/'. $file);
           }
    
           $exp = explode('.', $image['name']);
           $ext = strtolower(end($exp));
           $new_name = time().'.'.$ext;
           
           $path = $base_path."uploads/".$new_name;
    
           move_uploaded_file($image['tmp_name'],  $path);
        }
        else 
        {
            $new_name = $file; 
        } 
    
    
    
        $sql = "UPDATE contacts 
                SET c_name = '$name', 
                    c_number = '$number',  
                    c_image = '$new_name',
                    c_status = '$status'
                    WHERE id = '$id' ";    
    
        if($db->update($sql))
        {
            $_SESSION['contact_success'] = "contact updated successfully.";    
            header("location: ../contacts.php");
            exit;
        }
    
    }
    else 
    {
        die("Error! No contacts found.");
    }
    // dd($contact)
}
else 
{
    header('location: create.php');
}