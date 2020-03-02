<?php 

include "./classes/DB.php";
include "./helpers/dump.php";

$db = new DB();

$id = $_GET['id'];

$check_sql = "SELECT c_name, c_image FROM contacts WHERE id = $id";
$data = $db->getData($check_sql);

$path = "uploads/".$data->fetch_assoc()['c_image'];


if($data->num_rows < 1)
{
    die("Error. No data found.");
}

if(file_exists($path))
{
    unlink($path);
}



$sql = "DELETE FROM contacts WHERE id = $id";

if($db->delete($sql))
{
    $_SESSION['contact_succes'] = "Contact deleted successfully.";
    header("location: contacts.php");
    exit;
}



