<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bing! | Checkout</title>
	
<link href="checkout.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	
<div class="navbarx"><div class="bing_title"><a href="index.php"><img src="images/bing_title.png" width="137" height="60" alt=""/></a></div>
<div class="shop">SHOP</div><div class="about">ABOUT</div><div class="contact">CONTACT</div></div>
	<div class="body-block">
		<img class="tick" src="images/tick.png" width="120" height="120" alt=""/>
		<h2 style="color:white;font-family: Overpass,sans-serif;position:absolute;left:30%;top:45%"><?php 
		session_start();
		if (isset($_SESSION['user']) == true) {
    echo "Hello, " . $_SESSION['user'] . "!"."Your order has been confirmed!";
}?></h2>
		<a href="invoice.php"><button class="btn btn-info">View your Invoice</button></a>
<div class="body-block">
</body>
</html>