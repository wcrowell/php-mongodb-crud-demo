<html>
<head>
	<title>Add User</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
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
		$db->users->insertOne($user);
		
		echo "<font color='green'>User added successfully.";
		echo "<br/><a href='index.php'>Main Page</a>";
	}
}
?>
</body>
</html>
