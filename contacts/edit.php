<?php
    include "inc/header.php";
 
    $id = $_GET['id'];

    $sql = "SELECT * FROM contacts WHERE id = $id";

    $data = $db->getData($sql);

    // dd($data->fetch_assoc());
?>



<div class="row">
    <div class="col-8 offset-2">
         <br><br>
        <h2>Create new contact</h2>

        <?php 
           if($data->num_rows  > 0)
           {

            while($row = $data->fetch_assoc())
            {
        ?>


        <form action="actions/update-contact.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $row['id'] ?>">


            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="c_name" class="form-control" value="<?= $row['c_name'] ?>">
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

                <input type="text" name="c_number" class="form-control" value="<?= $row['c_number'] ?>">
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
                <label for="">Contact Image</label> <br>
 
                 <img width="100px" src="uploads/<?= $row['c_image'] ?>" />
                 <br><br>

                <input type="file" name="c_image" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="c_status" class="form-control" id="">

                <option 
                <?= ($row['c_status'] == true) ?  "selected" : ""  ?>
                value="1">Published</option>

                <option
                <?= ($row['c_status'] == false) ?  "selected" : ""  ?>
                value="0">Unpublished</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Save contact">
            </div>

        </form>

        <?php 
            }
           }
           else 
           {
        ?>


          <h1 class="text-danger">No contact found</h1>

        <?php 
           }
        ?>

          <br><br><br><br> 
    </div>
</div>



<?php
    include "inc/footer.php";
?>