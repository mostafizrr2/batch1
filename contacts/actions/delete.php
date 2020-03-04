<?php 
include __DIR__."/../config.php";

include $base_path."classes/DB.php";
include $base_path."helpers/dump.php";


$db = new DB();

$id = $_GET['id'];

$check_sql = "SELECT c_name, c_image FROM contacts WHERE id = $id";
$data = $db->getData($check_sql);

$path = "uploads/".$data->fetch_assoc()['c_image'];


if($data->num_rows < 1)
{
    die("Error. No data found.");
}

if(file_exists($base_path.$path))
{
    unlink($base_path.$path);
}



$sql = "DELETE FROM contacts WHERE id = $id";

if($db->delete($sql))
{
    $_SESSION['contact_succes'] = "Contact deleted successfully.";
    header("location: ../contacts.php");
    exit;
}



