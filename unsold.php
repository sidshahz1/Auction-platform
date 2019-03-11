
<?php

session_start();

if(!isset($_SESSION['name'])){
	header('location:loginpage.php');

}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['name']);
	header('location:loginpage.php');
}

?>

<html>
<head>
<title>Admin page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
body {
    background-image: url("background.jpg");
}
form {
	text-align: center;
}
#footer{
	border-style: solid;
    border-color: red;
	background-color: lightblue;
    position: fixed;
    height: 50px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    margin-bottom: 0px;
}
#cardborder{
	border-style: solid;
    border-color: black;
	background-color: lightblue;
}
.items{
float:left;
margin:0 5% 0 5%;
width:40%;
}

.card{
background-color: lightblue;
}
tr,th,td{
    border: 1px solid black;
}

</style>

</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">auction plateform</a>
    </div>
    <ul class="nav navbar-nav">
      
      <li><a href="admin.php">home</a></li>
	  <li><a href="sold.php">sold products</a></li>
      <li class="active"><a href="#">unsold products</a></li>
	  <li><a>welcome &nbsp<?php  echo $_SESSION["name"];  ?></a></li>
	  <li><a href="home.php?logout='1'">Logout</a></li>
    </ul>
  </div>
</nav>
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'auction';

// Create connection
$conn =mysqli_connect($host, $username, $password, $db);
	$sql="SELECT * from info_db";
	$results = mysqli_query($conn, $sql);
	$current_time= time();
	
    echo '<table style="width:100%">';
        echo "<tr>
            <th>product id</th>
            <th>seller</th>
            <th>product name</th>
            <th>base price</th>
            <th>current bid</th>
            <th>buyer</th>
            <th>rem d</th>
            <th>rem h</th>
            <th>rem m</th>
            <th>status</th>
        </tr>";
		while($row=$results->fetch_assoc()){
			$time=$row['add_time'];
			$time+= 604800;
			$time_left= ($time-$current_time>0)?$time-$current_time:0;
			$days= intdiv($time_left,86400);
			$hours= intdiv(($time_left%86400),3600);
			$min= intdiv((($time_left%86400)%3600),60);
            
            if($row['status']=='n'){
                echo "
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['user']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['base_price']."</td>
                        <td>".$row['current_bid']."</td>
                        <td>".$row['buyer']."</td>
                        <td>".$days."</td>
                        <td>".$hours."</td>
                        <td>".$min."</td>
                        <td>".$row['status']."</td>
                    </tr>
                ";
            }
		}
	echo '</table>';

?>
</body>
</html>
