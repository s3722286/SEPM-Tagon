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

    // Data to delete
    $sql = "DELETE FROM MyGuests WHERE id=$userID";

    if ($connection->query($sql) === TRUE) {
        echo "User deleted";
    }
    else {
        echo "Error deleting user: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
    ?>