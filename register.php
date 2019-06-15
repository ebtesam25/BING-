<?php

$nameErr=$emailErr=$phoneErr=$passwordErr=$password1Err=$dobErr=$addressErr=$genderErr="";

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register | Bing!</title>
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
<link href="register.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="logox"><a href="index.php"><img id="binglogo" src="images/bing_title.png" width="137" height="60" alt=""/></a></div>
	<div class="body70">
	<div class="lform">
		<div class="imgleft">
	<img id="popbot" src="images/popcorn_bot.gif" width="800" height="600" alt=""/> 
			</div>
		<div class="fright">
		<h1>Register</h1>
			<form method="post" action="db_insert.php">
		<div class="form-group">
    <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Name" required>
    <span class="error_message" style="color: red;"><?php echo $nameErr;?></span>
  </div>
  <div class="form-group">
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" required>
    <span class="error_message"><?php echo $emailErr;?></span>
  </div>
<div class="form-group">
    <input type="phone" class="form-control" name="phone" id="exampleInputPhone" placeholder="Phone" required>
    <span class="error_message"><?php echo $phoneErr;?></span>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
    <span class="error_message"><?php echo $passwordErr;?></span>
  </div>
<div class="form-group">
    <input type="password" class="form-control" id="exampleInputCPassword1" placeholder="Confirm Password" required>
  </div>
<div class="form-group">
    <input type="date" class="form-control" name="dob" id="exampleDob" placeholder="Date of Birth [DD/MM/YYYY]" required>
    <span class="error_message"><?php echo $dobErr;?></span>
  </div>
<div class="form-group">
    <textarea required class="form-control" name="address" id="exampleFormControlTextArea" rows="3" placeholder="Shipping Address"></textarea>
    <span class="error_message"><?php echo $addressErr;?></span>
  </div>
  <button type="submit" name="regbtn" class="btn btn-primary">Submit</button>
</form>
			<div class="signupred">Already have an account? <a href="login.php">Login</a> </div>
		</div>
	</div>
</div>
	
</body>
</html>
