
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
<title>Home page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
body {
    background: rgb(70,130,180);
}
form {
	text-align: center;
}
.items{
width: 30%;
float: left;
margin: 1.66%;
}

.card{
background: rgb(176,196,222);
border: 2px solid black;
padding: 5px 0 5px 5px;
}

#proname{
	background: rgb(105,105,105);
	text-align: center;
	margin-right: 5px;
	height: 35px;
	color: white;
	padding-top: 5px;
	font-size: 20px;
}

table{
	width: 90%;
}

h5{
	text-transform: capitalize;
}

li{
	text-transform: uppercase;
}


</style>

</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><strong>AUCTION PLATFORM</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active" ><a href="#">home</a></li>
      <li><a href="newpage.php">add new product</a></li>
	  <li><a href="userproduct.php">your products</a></li>
	  <li><a href="history.php">bought products</a></li>
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
	
	echo '<ul style="list-style-type:none">';
		while($row=$results->fetch_assoc()){
			$time=$row['add_time'];
			$time+= 604800;
			$time_left= $time-$current_time;
			$days= intdiv($time_left,86400);
			$hours= intdiv(($time_left%86400),3600);
			$min= intdiv((($time_left%86400)%3600),60);
			
			if ($time_left > 0 && $row['status']=='a'){
				echo "
							<div class='card items'>
								<div class='card-body' >
									<h5 class='class-header' id='proname' ><strong>".$row['name']."</strong></h5>
									<p class='card-text' >".$row['about']."</p>
									<table>
										<tr>
											<th>Days<th>
											<th>Hours<th>
											<th>Minutes<th>
										</tr>
										<tr>
											<th>".$days."<th>
											<th>".$hours."<th>
											<th>".$min."<th>
										</tr>
									</table>
									<br>
									<table>
										<tr>
											<td>Base Price<td>
											<td>".$row['base_price']."<td>
										</tr>
										<tr>
											<td>Currrent Bid<td>
											<td>".$row['current_bid']."<td>
										</tr>
									</table>
									<br>
									<p class='card-text' >Seller-".$row['user']."</p>
									<form action='bid.php?useridvalue=".$row['id']."&rem_time=".$time_left."' method='POST'>
										Your bid:
										<input type='text' name='bidvalue'>
										<input type='submit' class='btn btn-primary' value='BID'>
									</form>
								</div>
							</div>
				";
				/*echo "
                    <script>
                        function timefunc(){
                            var t= ".$time_left.";
                            document.getElementById('".$row['id']."').innerHTML= t; 
                            setTimeout(timefunc,1000);
                        }
                        timefunc();
                    </script>
                ";*/
			}
			else{
				if($row['current_bid']>$row['base_price'])
				{
					$status= 'y';
				}
				else{
					$status= 'n';
				}
				$sql1 = "UPDATE info_db SET status = '".$status."'
            	WHERE id = ".$row['id'];
            	mysqli_query($conn,$sql1);
			}
		}
	echo '</ul>';

?>
</body>
</html>
