<?php

// Connection values

function connect(){
    
    $sqlHost = "localhost";
    $sqlUsername = "root";
    $sqlPassword = file_get_contents('devDBPassword.txt');//Used only in development for local database put your local db password in this text file to test website
   
    $connection = new mysqli ($sqlHost, $sqlUsername, $sqlPassword);
    return $connection;
}

function init(){
    // Establish connection
    $connection = connect();

    // Check current connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Create DB
    $sql = file_get_contents('initDB.sql');
    //echo $sql; 
    if ($connection->multi_query($sql) === TRUE) {
        //echo "Database Initialised"; All is fine
    }else {
        echo "Error initalising Database: " . $connection->error;
    }

    $connection->close();
}

function createUser($userName,$password){
    // Establish connection
    $connection = connect();

    // Check current connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Data to insert
    $sql = "INSERT INTO sempdatabase.users (userName, password)
    VALUES ('$userName', '$password')";

    if ($connection->query($sql) === TRUE) {
        echo "New user created";
    }
    else {
        echo "Error creating user: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}

function deleteUser($userID){
    
    // Establish connection
    $connection = connect();

    // Check current connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Data to delete
    $sql = "DELETE FROM sempdatabase.users WHERE userID='$userID'";

    if ($connection->query($sql) === TRUE) {
        echo "User deleted";
    }
    else {
        echo "Error deleting user: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}

//initalise database to make sure that the schema and tables exist
init();
createUser("Name","Password");
?>

