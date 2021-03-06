<?php 
include "inc/header.php";

?>

<div class="row">
    <div class="col-8 offset-2">
         <br><br>
        <h2>Register your account</h2>
        
        <form action="actions/actionregister.php" method="POST">
            <div class="form-group">
                <label for="">Name</label>

                <?php 
                  if(isset($_SESSION['name_value']))
                  {
                      $name = $_SESSION['name_value'];
                  }
                  else 
                  {
                     $name = null;
                  }
            
                ?>


                <input type="text" name="name" class="form-control" value="<?= $name ?>">

                <?php 
                  if(isset($_SESSION['error_name']))
                  {
                ?>
                 <p class="text-danger">
                     <?= $_SESSION['error_name'] ?>
                 </p>
                <?php
                  }
                ?>
            </div>


            <div class="form-group">
                <label for="">Email Address</label>

                <?php 
                  if(isset($_SESSION['email_value']))
                  {
                      $email = $_SESSION['email_value'];
                  }
                  else 
                  {
                     $email = null;
                  }
            
                ?>


                <input type="email" name="email" class="form-control" value="<?= $email ?>" >

                <?php 
                  if(isset($_SESSION['error_email']))
                  {
                ?>
                 <p class="text-danger">
                     <?= $_SESSION['error_email'] ?>
                 </p>
                <?php
                  }
                ?>
            </div>           
            
             <div class="form-group">
                <label for="">Password</label>

                <input type="text" name="password" class="form-control">

                <?php 
                  if(isset($_SESSION['error_password']))
                  {
                ?>
                 <p class="text-danger">
                     <?= $_SESSION['error_password'] ?>
                 </p>
                <?php
                  }
                ?>
            </div>


            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Register">
            </div>

        </form>

          <br><br><br><br> 
    </div>
</div>


<?php 

include"inc/footer.php";
?>