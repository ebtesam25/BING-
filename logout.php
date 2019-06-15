<?php
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['shopping_cart']);
	header('location: index.php');
?>