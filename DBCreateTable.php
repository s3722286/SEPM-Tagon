<?php

// Connection values
$host = "localhost";
$username = "root";
$password = "zandKz73T8";
$dbname = "clientDB";

// Establish connection
$connection = new mysqli ($host, $username, $password);

// Check current connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create user table
$sql = "CREATE TABLE Users (
userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Create DB
$sql = "CREATE DATABASE clientDB";
if ($connection->query($sql) === TRUE) {
    echo "Table created";
}
else {
    echo "Error creating Table: " . $connection->error;
}

$connection->close();
?>