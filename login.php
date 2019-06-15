<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login | Bing!</title>
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Numans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="login.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="logox"><a href="index.php"><img id="binglogo" src="images/bing_title.png" width="137" height="60" alt=""/></a></div>
<div class="body70">
	<div class="lform">
		<div class="imgleft">
	<img id="popbot" src="images/popcorn_bot.gif" width="800" height="600" alt=""/> 
			</div>
		<div class="fright">
		<h1>Login</h1>
			<form method="post" action="db_login.php">
  <div class="form-group">
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" name="loginbtn">Login</button>
</form>
			<div class="signupred">New customer? <a href="register.php">Sign up</a> </div>
		</div>
	</div>
</div>
</body>
</html>
