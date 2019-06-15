<?php
	session_start();
 
	require_once 'conn.php';
 
	if(ISSET($_POST['loginbtn'])){
		if($_POST['email'] != "" || $_POST['password'] != ""){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$hash="SELECT password from customers WHERE email=?";
			$match=password_verify($password, $hash);
			$sql = "SELECT * FROM `customers` WHERE `email`=?";
			$query = $conn->prepare($sql);
			$query->execute(array($email));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if(password_verify($password, $fetch['password'])) {
				//echo "<script>alert('Successfully logged in')</script>
				//<script>window.location = 'index.php'</script>";
				$_SESSION['user'] = $fetch['name'];
				header("location: index.php");
				
			} else{
				echo "Password: {$password} <br>";
				echo "
				<script>alert('Invalid email or password')</script>
				<script>window.location = 'login.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete all required fields!')</script>
				<script>window.location = 'login.php'</script>
			";
		}
	}
?>