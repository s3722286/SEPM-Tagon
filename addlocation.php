<?php
session_start();
require_once './database.php';

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}
//php not accurate or fully completed as database is not integrated     
if(isset($_POST['locationname']) && isset($_POST['xcoordinate']) && isset($_POST['ycoordinate']) && isset($_POST['description'])){
  $locationname= $_POST['locationname'];
  $xcoordinate= $_POST['xcoordinate'];
  $ycoordinate= $_POST['ycoordinate'];
  $description= $_POST['description'];
  // Location time is calculated assuming each word in description will take half a second to pronounce by the robot
  // If odd number of words an extra half second is added to minimal time to be spent at a location
  $locationtime= ceil(0.5 * str_word_count($description));

  //check if duplicate location name exists in the database
  if(createLocation($locationname, $xcoordinate, $ycoordinate, $locationtime, $description) !== FALSE){
    echo "<script> alert(\"Successfully created new location with the name of: $locationname\");</script>"; 
  }else{
    echo "<script> alert(\"Error: Failed to create location. A location with the name of $locationname already exists.\");</script>"; 
  }
}

?>
<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Add Location</title>
    </head>
    <form name="addlocation" method="post">
      <h2> Add new location </h2>
      <div class="row">
        <p>Location Name:<input type="text" id="locationname" name="locationname" required></p>
      </div>
      <div class="row">
        <p>X Coordinate:<input type="number" id="xcoordinate" name="xcoordinate" required></p>
      </div>
      <div class="row">
        <p>Y Coordinate:<input type="number" id="ycoordinate" name="ycoordinate" required></p>
      </div>
      <div class="row">
        <label for="description">Description:</label>
        <br><br>
        <textarea class="description" id="description" name="description" rows="4" cols="30"> </textarea>
      </div>
      <div class="row">
        <input type = "submit" value="Create new location">
        <a href= "main.php"> Back <a>
      </div>
    </form>
</main>
