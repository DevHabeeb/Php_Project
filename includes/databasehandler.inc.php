<?php

$dsn = "mysql:host=localhost;dbname=firstdatabase";
$dbusername = "root";
$dbpassword = "";

//connect to data base using pdo(php data object)
try {
$pdo = new PDO($dsn, $dbusername, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO error mode to exception
} catch (PDOException $e) { 
    echo "Connection failed: " . $e->getMessage(); // Handle connection error
}




