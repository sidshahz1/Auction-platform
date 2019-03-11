<?php

session_start();



if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'auction';

// Create connection
$conn =mysqli_connect($host, $username, $password, $db);


	if(!empty($id)){
		$sql = "SELECT status,base_price,current_bid FROM info_db where id=$id";
		
        $result=mysqli_query($conn,$sql);
        $row=$result->fetch_assoc();
        
        if($row['base_price']<$row['current_bid'])
        {
                $sql1 = "UPDATE info_db SET status = 'y'
                WHERE id = ".$id."";
                mysqli_query($conn,$sql1);
                header('location:userproduct.php');
        }
        else{
            $sql1 = "UPDATE info_db SET status = 'n'
                WHERE id = ".$id."";
                mysqli_query($conn,$sql1);
                header('location:userproduct.php');
        }
	}

?>