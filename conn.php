<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "dataset_code"; 
$port = 3306; 

try {
  $conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>