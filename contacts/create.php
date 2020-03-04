<?php 
include "inc/header.php";
?>

<div class="row">
    <div class="col-8 offset-2">
         <br><br>
        <h2>Create new contact</h2>
        <form action="actions/storecontact.php" method="POST" enctype="multipart/form-data">
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


                <input type="text" name="c_name" class="form-control" value="<?= $name ?>">
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
                <label for="">Contact Number</label>

                <?php 
                  if(isset($_SESSION['number_value']))
                  {
                      $number = $_SESSION['number_value'];
                  }
                  else 
                  {
                     $number = null;
                  }
            
                ?>

                <input type="text" name="c_number" class="form-control" value="<?= $number ?>">
                <?php 
                  if(isset($_SESSION['error_number']))
                  {
                ?>
                   <p class="text-danger">
                       <?= $_SESSION['error_number'] ?>
                    </p>
                <?php
                  }
                ?>
            </div>

            <div class="form-group">
                <label for="">Contact Image</label>
                <input type="file" name="c_image" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="c_status" class="form-control" id="">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Save contact">
            </div>

        </form>

          <br><br><br><br> 
    </div>
</div>


<?php 

include"inc/footer.php";
?>