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

function canCreateUser($username,$connection){
    
    // Check if username already exists
    $sql = "SELECT * FROM sempdatabase.users WHERE username='$username'";

    if ($connection->query($sql) !== FALSE && $connection->affected_rows == 0) {
        return TRUE;
    }else {
        return FALSE;
    }
    $connection->close();

}

function createUser($username,$password, $userType){
    // Establish connection
    $connection = connect();

    // Check current connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Data to insert
    $sql = "INSERT INTO sempdatabase.users (userName, password, userType)
    VALUES ('$username', '$password', '$userType')";

    if (canCreateUser($username,$connection) === TRUE && $connection->query($sql) === TRUE) {
        return TRUE;
        
    }else {
        return FALSE;
    }

    $connection->close();
}

function validateLogin($username,$password){
    
    $connection = connect();
    $sql = "SELECT * FROM sempdatabase.users WHERE username='$username' AND password='$password'";
    //var_dump($connection->query($sql));
    
    if ($connection->query($sql) !== FALSE && $connection->affected_rows == 1) {
        return TRUE;
    }else {
        return FALSE;
    }
    $connection->close();

}

function get_all_users(){
    $connection = connect();
    $query='SELECT * FROM sempdatabase.users';   		
	$result=mysqli_query($connection, $query);
	$count=mysqli_num_rows($result);
	
	for($i=0;$i<$count;$i++) {
        $row[$i]=mysqli_fetch_array($result);
    }
    return $row;
    
    $connection->close();
}

function fill_user($user) {
    $connection = connect();
    // $userID = $_POST['userID'];
    $query="SELECT * FROM sempdatabase.users WHERE userID = '$user'";
    $result = mysqli_query($connection,$query);
    $field = mysqli_fetch_array($result);

    return $field;

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

function editUser($regUsername, $regPassword, $userType){
    $connection = connect();
    $query="UPDATE sempdatabase.users SET (userName, password, userType)
    VALUES ('$username', '$password', '$userType')";   		
    
    if ($connection->query($sql) === TRUE) {
        echo "User Edited";
    }
    else {
        echo "Error editing user: " . $sql . "<br>" . $connection->error;
    }
    
    $connection->close();
}

//initalise database to make sure that the schema and tables exist
init();
//createUser("admin","fakepass");
//echo validateLogin("amin","fakepass");
//deleteUser("1");
?>