<?php
include_once("config.php");

// select data in descending order from table/collection "users"
$result = $db->users->find()->sort(array('_id' => -1));
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New User</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Twitter</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 	
	foreach ($result as $res) {
		echo "<tr>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['last_name']."</td>";
		echo "<td>".$res['twitter']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[_id]\">Edit</a> | <a href=\"delete.php?id=$res[_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
