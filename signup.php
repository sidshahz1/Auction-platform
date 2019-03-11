<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'auction';

// Create connection
$conn =mysqli_connect($host, $username, $password, $db);




if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['pwd'])){
	$firstname = htmlentities($_POST['firstname']);
	$lastname = htmlentities($_POST['lastname']);
	$username = htmlentities($_POST['username']);
	$pwd = htmlentities($_POST['pwd']);
	
	
	
	if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($pwd)){
		$sql = "INSERT INTO user_info (firstname, lastname, username, password) VALUES ('$firstname','$lastname','$username','$pwd ')";
		
		mysqli_query($conn,$sql);
	}
}
mysqli_close($conn);
header("location:loginpage.php");
?>