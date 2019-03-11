<?php

session_start();



if(isset($_GET['useridvalue']))
{
    $id=$_GET['useridvalue'];
}
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'auction';

// Create connection
$conn =mysqli_connect($host, $username, $password, $db);

if(isset($_POST['bidvalue'])){
	$bidvalue = htmlentities($_POST['bidvalue']);
    $rem_time=$_GET['rem_time'];
	

	if(!empty($bidvalue) && !empty($id)){
		$sql = "SELECT current_bid FROM info_db where id=$id";
		
        $result=mysqli_query($conn,$sql);
        $row=$result->fetch_assoc();

        
        
        if($bidvalue>$row['current_bid'])
        {
            if($rem_time>3600){
                $sql1 = "UPDATE info_db SET current_bid = ".$bidvalue.", buyer= '".$_SESSION['name']."'
                WHERE id = ".$id."";
                mysqli_query($conn,$sql1);
                header('location:home.php');
            }
            else{
                $sql2= "SELECT add_time FROM info_db WHERE id= ".$id."";
                $res= mysqli_query($conn,$sql2);
                $row=$res->fetch_assoc();
                $time=$row['add_time']+1800;
                $sql1 = "UPDATE info_db SET current_bid = ".$bidvalue.", buyer= '".$_SESSION['name']."', add_time=".$time."
                WHERE id = ".$id."";
                mysqli_query($conn,$sql1);
                header('location:home.php');
            }
        }
        else{
            header('location:home.php');
        }
	}
}

?>