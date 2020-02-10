<?php 

if(isset($_POST['submit']))
{

   // Getting file informations 
   $file_name = $_FILES['img']['name'];
   $file_tmp = $_FILES['img']['tmp_name'];

   // Generate new name
   $xpd = explode('.', $file_name);
   $ext = strtolower( end($xpd) );
   $new_name = "image_".time().".".$ext;

   //Destination
   $path = "uploads/".$new_name;

   //Upload
   $upload = move_uploaded_file($file_tmp, $path);

    if($upload){
        echo "image uploaded successfully.";
    }
    else 
    {
        echo "Upload failed.";
    }

}