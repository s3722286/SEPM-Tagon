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

    // Data to insert
    $sql = "INSERT INTO Users (email, pass)
    VALUES ($email, $pass)";

    if ($connection->query($sql) === TRUE) {
        echo "New user created";
    }
    else {
        echo "Error creating user: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
?>