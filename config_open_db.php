
<?php
// used to connect to the database
$db_server = "localhost";
$db_username = "root";
$db_password = "Chandler";
$db_database = "bing";
// $host = "localhost";
// $db_name = "bing";
// $username = "root";
// $password = "";
 
try {
    // $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $conn = new PDO("mysql:host=$db_server; dbname=$db_database", $db_username, $db_password);
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>

