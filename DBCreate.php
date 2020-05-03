<?php

// Connection values
$host = "localhost";
$username = "root";
$password = "zandKz73T8";

// Establish connection
$connection = new mysqli ($host, $username, $password);

// Check current connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create DB
$sql = "CREATE DATABASE clientDB";
if ($connection->query($sql) === TRUE) {
    echo "Database created";
}
else {
    echo "Error creating Database: " . $connection->error;
}

$connection->close();
?>