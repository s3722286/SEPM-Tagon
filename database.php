<?php

// Connection values

function connect(){
    
    //Replace SQL host,username and password for the database you are using
    //Details here may have been used in development
    $sqlHost = "35.189.54.237"; //pra3-1semp Google Cloud DB 
    $sqlUsername = "root";
    $sqlPassword = "sHfjj5DAA04q6OIy";//This password is used only in development for cloud database
   
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

function canCreateLocation($locationname){
    
    $connection = connect();
    // Check if location name already exists
    $sql = "SELECT * FROM sempdatabase.locations WHERE locationName='$locationname'";

    if (($connection->query($sql) !== FALSE) && ($connection->affected_rows == 0)) {
        return TRUE;
    }else {
        return FALSE;
    }

    $connection->close();
    

}

function createLocation($locationname, $xcoordinate, $ycoordinate, $locationtime, $description){
    // Establish connection
    $connection = connect();

    // Check current connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Data to insert
    $sql = "INSERT INTO sempdatabase.locations (locationName, xCoordinate, yCoordinate, minTime, description)
    VALUES ('$locationname', '$xcoordinate', '$ycoordinate', '$locationtime', '$description')";

    if ((canCreateLocation($locationname) == TRUE) && ($connection->query($sql) !== FALSE)) {
        $connection->close();
        return TRUE;
        
    }else {
        $connection->close();
        return FALSE;
    }

    
}

function get_location($id) {
    $connection = connect();
    // $userID = $_POST['userID'];
    $query="SELECT * FROM sempdatabase.locations WHERE locationID = '$id'";
    $result = mysqli_query($connection,$query);
    $field = mysqli_fetch_array($result);

    return $field;

    $connection->close();
}

function updateLocation($id, $name, $xCoord, $yCoord, $minTime, $desc){
    $connection = connect();
    $sql="UPDATE sempdatabase.locations SET locationName = '$name', xCoordinate = '$xCoord', yCoordinate = '$yCoord', minTime = '$minTime', description = '$desc' WHERE locationID = $id;";   
    //echo $sql;
    
    if ($connection->query($sql) !== FALSE) {
        return TRUE;
    }
    else {
        return FALSE;
    }

    $connection->close();
}

function deleteLocation($id){
    
    // Establish connection
    $connection = connect();

    // Check current connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Data to delete
    $sql = "DELETE FROM sempdatabase.locations WHERE locationID='$id'";

    if ($connection->query($sql) !== FALSE) {
        return TRUE;
    }
    else {
        return FALSE;
    }

    $connection->close();
}

function getLocationTime($id){
    $connection = connect();
    $sql = "SELECT locations.minTime FROM sempdatabase.locations WHERE locationID='$id'";
    
	$result = mysqli_query($connection, $sql);
    $types = mysqli_fetch_array($result);
    $connection->close();
    //Need result will always be an array even if its only 1 result
    return $types[0];
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

function getUserType($username){
    $connection = connect();
    $sql = "SELECT users.userType FROM sempdatabase.users WHERE username='$username'";
    
	$result = mysqli_query($connection, $sql);
    $types = mysqli_fetch_array($result);
    $connection->close();
    //Need result will always be an array even if its only 1 result
    return $types[0];
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

function get_all_locations(){
    $connection = connect();
    $query='SELECT * FROM sempdatabase.locations';   		
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

    $connection->query($sql);

    $connection->close();
}

function editUser($username, $password, $userType, $id){
    $connection = connect();
    $sql="UPDATE sempdatabase.users SET userName = '$username', password = '$password', userType = '$userType' WHERE userID = $id;";   
    
    $connection->query($sql);
    $connection->close();
}

function createTour($name, $type, $locations, $minDuration){
    // Establish connection
    $connection = connect();

    // Check current connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Data to insert
    $sql = "INSERT INTO sempdatabase.tours (tourName, tourType, tourLocations, minDuration)
    VALUES ('$name', '$type', '$locations', '$minDuration')";

    if ($connection->query($sql) !== FALSE) {
        $connection->close();
        return TRUE;
        
    }else {
        $connection->close();
        return FALSE;
    }

    
}

function getAllTours(){
    $connection = connect();
    $query='SELECT * FROM sempdatabase.tours';   		
	$result=mysqli_query($connection, $query);
	$count=mysqli_num_rows($result);
	
	for($i=0;$i<$count;$i++) {
        $row[$i]=mysqli_fetch_array($result);
    }
    $connection->close();
    return $row;
    
}

function removeTour($tourID){
    $connection = connect();
    $sql = "DELETE FROM sempdatabase.tours WHERE tourID='$tourID'";   
    mysqli_query($connection, $sql);
    
    $connection->close();
}

function changeTour($tourID, $name, $type, $locations, $minDuration){
    $connection = connect();
    $sql="UPDATE sempdatabase.tours SET tourName = '$name', tourType= '$type', tourLocations = '$locations', minDuration = '$minDuration' WHERE tourID = '$tourID';";
    mysqli_query($connection, $sql);
    
    $connection->close();
}

function canAddTourType($newType){
    $connection = connect();
    $sql="SELECT * FROM sempdatabase.tourTypes WHERE tourTypeName = '$newType'";   
    $result=mysqli_query($connection, $sql);
    $count=mysqli_num_rows($result);
    
    if($count >= 1){
        return FALSE;
    }else return TRUE;
    
    $connection->close();
}

function addTourType($newType){
    $connection = connect();
    $sql="INSERT INTO sempdatabase.tourTypes (tourTypeName) values ('$newType')";   
    mysqli_query($connection, $sql);
    
    $connection->close();
}

function getAllTourTypes(){
    $connection = connect();
    $query='SELECT * FROM sempdatabase.tourTypes';   		
	$result=mysqli_query($connection, $query);
	$count=mysqli_num_rows($result);
	
	for($i=0;$i<$count;$i++) {
        $row[$i]=mysqli_fetch_array($result);
    }
    $connection->close();
    return $row;
    
}

function removeTourType($tourType){
    $connection = connect();
    $sql = "DELETE FROM sempdatabase.tourTypes WHERE tourTypeName='$tourType'";   
    mysqli_query($connection, $sql);
    
    $connection->close();
}

function changeTourType($tourType, $changedTourType){
    $connection = connect();
    $sql="UPDATE sempdatabase.tourTypes SET tourTypeName = '$changedTourType' WHERE tourTypeName = '$tourType';";
    mysqli_query($connection, $sql);
    
    $connection->close();
}


//initalise database to make sure that the schema and tables exist
//init();
//createUser("admin","fakepass");
//echo validateLogin("amin","fakepass");
//deleteUser("1");
?>