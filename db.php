<?php 

$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "playlist_db"; 

$conn = mysqli_connect($host, $user, $pass); 

if (!$conn) { die("Database connection failed: " . mysqli_connect_error()); } 

if (!mysqli_select_db($conn, $dbname)) { 
    if (!mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `$dbname`")) 
    { die("Database creation failed: " . mysqli_error($conn)); 
} 

mysqli_select_db($conn, $dbname); } 
mysqli_set_charset($conn, "utf8mb4"); 

$sql = "CREATE TABLE IF NOT EXISTS vplaylist ( id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR(255) NOT NULL, artist VARCHAR(255) NOT NULL, vsinger VARCHAR(255) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP )"; 

if (!mysqli_query($conn, $sql)) { die("Table creation failed: " . mysqli_error($conn)); } ?>