<?php

session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'auction';

// Create connection
$conn =mysqli_connect($host, $username, $password, $db);




if(isset($_POST['name']) && isset($_POST['about']) && isset($_POST['bp'])){
	$name = htmlentities($_POST['name']);
	$about = htmlentities($_POST['about']);
	$bp = htmlentities($_POST['bp']);
	$user= $_SESSION['name'];
	$time= time();

	

	if(!empty($name) && !empty($about) && !empty($bp)){
		$sql = "INSERT INTO info_db (user,name, about, base_price,current_bid,add_time,status) VALUES ('$user','$name','$about','$bp',$bp,$time,'a')";
		
		mysqli_query($conn,$sql);
	}
}
mysqli_close($conn);
header("location:newpage.php");
?>