<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$user = array (
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'twitter' => $_POST['twitter'],
				'email' => $_POST['email']
			);
	
	// checking required fields
	$errorMessage = '';
	foreach ($user as $key => $value) {
		if (empty($value)) {
			$errorMessage .= $key . ' field is required<br />';
		}
	}
			
	if ($errorMessage) {
		echo '<span style="color:red">'.$errorMessage.'</span>';
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";	
	} else {
		$db->users->updateOne(
    			[ '_id' => '$id' ],
    			[ '$set' => [ 'first_name' => 'testme' ]]
		);
		$db->users->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)], ['$set' => $user ]); 
		header("Location: index.php");
	}
} // end if $_POST
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = $db->users->findOne([
    '_id' => new MongoDB\BSON\ObjectId($id),
]);

$first_name = $result['first_name'];
$last_name = $result['last_name'];
$email = $result['email'];
$twitter = $result['twitter'];
?>
<html>
<head>	
	<title>Edit User</title>
</head>

<body>
	<a href="index.php">Main Page</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>First Name</td>
				<td><input type="text" name="first_name" value="<?php echo $first_name;?>"></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="last_name" value="<?php echo $last_name;?>"></td>
			</tr>
			<tr> 
				<td>Twitter</td>
				<td><input type="text" name="twitter" value="<?php echo $twitter;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
