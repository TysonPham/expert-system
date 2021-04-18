<?php 


$servername = "localhost:3308";
$username = "dfc353_4";
$password = "team30";
$dbname = "dfc353_4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
