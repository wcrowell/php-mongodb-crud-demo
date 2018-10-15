<?php
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from collection
$db->users->deleteOne(['_id' => new \MongoDB\BSON\ObjectID($id)]);

//redirecting to the main page
header("Location:index.php");
?>

