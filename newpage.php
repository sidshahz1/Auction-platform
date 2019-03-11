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




<!doctype html>
<html>

<head>
<title>login page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
body {
    background: rgb(70,130,180);
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

.login{
  background: rgb(169,169,169);
  border: 2px solid black;
  width: 300px;
  height: 250px;
  padding: 50px 0 0 15px;
  margin: 0 auto;
  border-radius: 20px;
}

h2{
  border-bottom: 2px solid gray;
  width: 20%;
  margin: 30px auto 15px auto;
  padding-bottom: 10px;
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
      <li><a href="home.php">home</a></li>
	  <li class="active"><a href="#">add new product</a></li>
    <li><a href="userproduct.php">your products</a></li>
    <li><a href="history.php">bought products</a></li>
    <li><a>welcome &nbsp<?php  echo $_SESSION["name"];  ?></a></li>
	  <li><a href="home.php?logout='1'">Logout</a></li>
    </ul>
  </div>
</nav>

<form action="new.php" method="POST">
  <h2>Enter info:</h2>
  <div class='login'>
		Name    :
		<input type="text" name="name"><br><br>
		About :  
		<input type="text" name="about"><br><br>
		Base price:  
		<input type="text" name="bp"><br><br>
    <input type="submit" class="btn btn-primary" value="add">
	</div>
</form>

<br>
<p id="footer">
contact no: 99999xxxxx <br>
address: vit university
</p>

</body>




</html>