<?php

session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'auction';

// Create connection
$conn =mysqli_connect($host, $username, $password, $db);

if(isset($_POST['username']) && isset($_POST['pwd'])){
	$username = htmlentities($_POST['username']);
	$pwd = htmlentities($_POST['pwd']);
	if($username!='sid123'){
		if(!empty($username) && !empty($pwd)){
			$sql= "SELECT username FROM user_info where username ='$username' && password ='$pwd'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 1){
				$_SESSION['name']=$username;
				if(isset($_SESSION['name'])){
				header('location:home.php');}
				
			}
			else{
				echo "incorrect credentials...";
				header( "Refresh:2; url=loginpage.php", true, 303);
				
			}
		}
		else{
			echo "please enter the field values";
			header( "Refresh:2; url=loginpage.php", true, 303);
		}
	}
	else{
		if(!empty($username) && !empty($pwd)){
			$sql= "SELECT username FROM user_info where username ='$username' && password ='$pwd'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 1){
				$_SESSION['name']=$username;
				if(isset($_SESSION['name'])){
				header('location:admin.php');}
				
			}
			else{
				echo "incorrect credentials...";
				header( "Refresh:2; url=loginpage.php", true, 303);
				
			}
		}
		else{
			echo "please enter the field values";
		}
	}
}

?>