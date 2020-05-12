<?php
$servername = "localhost";
$Username = "root";
$password = "";
$dbname="hospital";

// Create connection
$conn = new mysqli($servername, $Username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>