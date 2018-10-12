<?php
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from collection
$db->users->remove(array('_id' => new MongoId($id)));

//redirecting to the main page
header("Location:index.php");
?>

