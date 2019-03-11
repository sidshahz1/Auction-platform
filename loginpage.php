<!doctype html>
<html>

<head>
<title>login page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
body {
    background-image: url("background.jpg");
}
li{
	text-transform: uppercase;
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
  border-radius: 17px;
}

h2{
  border-bottom: 2px solid gray;
  width: 20%;
  margin: 30px auto 5px auto;
  padding-bottom: 10px;
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
      <li class="active"><a href="#">login</a></li>
	    <li><a href="signuppage.php">sign up</a></li>
      <li><a href="home.php">home</a></li>
      <li><a href="newpage.php">add new product</a></li>
    </ul>
  </div>
</nav>

<form action="login.php" method="POST">
    <h2>login</h2>
    <br>
  <div class="login">  
		Username    :
		<input type="text" name="username" required><br><br>
		Password  :  
		<input type="password" name="pwd" required><br><br>
		<input type="submit" class="btn btn-primary" value="login">
		<a href="signup.html"><button type="button" class="btn btn-primary">signup</button></a>
  </div>
</form>

<br>
<p id="footer">
contact no: 99999xxxxx <br>
address: vit university
</p>

</body>




</html>