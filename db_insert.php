<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "Chandler";
$db_database = "bing";

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$dob=$_POST['dob'];
$address=$_POST['address'];


$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    //echo $nameErr;
} 
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     $nameErr = "Only letters and white space allowed"; 
}
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    //echo $nameErr;
} 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $emailErr = "Invalid email format"; 
 }
if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
    //echo $nameErr;
} 
if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    //echo $nameErr;
} 
//if (empty($_POST["password1"])) {
  //  $password1Err = "Confirmation is required";
    //echo $nameErr;
//} 

//if(strcmp($password, $password1)){
  //  	$password1Err = "Passwords do not match!";
    	
 //}
if (empty($_POST["dob"])) {
    $dobErr = "Date of Birth is required";
    //echo $nameErr;
} 
if (empty($_POST["address"])) {
    $addressErr = "Address is required";
    //echo $nameErr;
} 



else {
$sql = "INSERT INTO customers (name, email, phone, password, dob,address)
VALUES ('$name', '$email', '$phone', '$hash','$dob', '$address')";
 
$conn->exec($sql);
echo "<script>alert('Account successfully added!'); window.location='index.php'</script>";
}
?>