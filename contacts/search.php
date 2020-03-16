<?php 
include "inc/header.php";

// dd(__DIR__);
if(isset( $_GET['search']))
{
    $s = $_GET['search'];
    $sql = "SELECT * FROM contacts WHERE c_name LIKE '%$s%' OR c_number LIKE '%$s%'  ORDER BY id DESC";
    $data = $db->getData($sql);

?>

<div class="row">
    
    <div class="col-8 offset-2">
         <br><br>

        <h2>Search results for - <?= $s ?></h2>

        <?php 
           if( isset($_SESSION['contact_success']) )
           {
         ?>
        <div class="alert alert-success" role="alert">
           <?=  $_SESSION['contact_success'] ?>
        </div>
        <?php 
           }
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            
            
            if($data->num_rows > 0){ 
                
                while( $row = $data->fetch_assoc() ) {
            ?>


                <tr>
                    <th scope="row"><?=  $row['id'] ?></th>
                    <td>
                        <img width="50px" src="uploads/<?=  $row['c_image'] ?>" alt="">
                    </td>
                    <td><?=  $row['c_name'] ?></td>
                    <td><?=  $row['c_number'] ?></td>
                    <td><?= ($row['c_status'] == true) ?  "Published" : "Unpublished"  ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="actions/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php 
                } 
            }
            else
            {
             ?>
              <h3>No contacts available</h3>
            <?php  
            }
            
            ?>
             
            </tbody>
        </table>

        <br><br><br><br> 
      </div>
      
</div>


<?php 
  }
  else 
  {
      die("Please search for a valid query.");
  }


include "inc/footer.php";

?>