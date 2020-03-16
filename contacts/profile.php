<?php 
include "inc/header.php"; 

if(!isset($_SESSION['user_id']))
{
    header('location: '. $host . 'login.php');
    exit;
}
?>

<div class="row">
    <div class="col-lg-4">
       <?= $_SESSION['name'] ?> <br>
       <?= $_SESSION['email'] ?> <br>
   </div>
</div><!-- /.row -->

<?php

include "inc/footer.php";

// session_destroy();

?>