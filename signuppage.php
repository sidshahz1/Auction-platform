<!doctype html>
<html>

<head>
<title>Signup page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
body {
    background-image: url("background.jpg");
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
  height: 300px;
  padding: 50px 0 0 15px;
  margin: 10px auto;
  border-radius: 17px;

}

h2{
  border-bottom: 2px solid gray;
  width: 20%;
  margin: 30px auto 5px auto;
  padding-bottom: 10px;
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
	  <li><a href="loginpage.php">login</a></li>
      <li class="active"><a href="#">sign up</a></li>
      <li><a href="home.php">home</a></li>
      <li><a href="newpage.php">add new product</a></li>
    </ul>
  </div>
</nav>


<div id="content">
<form action="signup.php" method="POST">
  <h2>signup info</h2>
  <div class='login'>
		First name    :
		<input type="text" name="firstname" required><br><br>
		Last name    :
		<input type="text" name="lastname" required><br><br>
		Username    :
		<input type="text" name="username" required><br><br>
		Password:  
		<input type="password" name="pwd" pattern=".{5,10}" required title="password must be 5 to 10 charcters"><br><br>
		<input type="submit" class="btn btn-primary" value="Sign up" >
	</div>
</form>

</div>

<br>
<p id="footer">
contact no: 99999xxxxx <br>
address: vit university
</p>

</body>




</html>