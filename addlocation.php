<?php
session_start();
require_once './database.php';

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}
//php not accurate or fully completed as database is not integrated     
if(isset($_POST['locationname']) && isset($_POST['xcoordinate']) && isset($_POST['ycoordinate']) && isset($_POST['locationtime'])){
  $locationname= $_POST['locationname'];
  $xcoordinate= $_POST['xcoordinate'];
  $ycoordinate= $_POST['ycoordinate'];
  $locationtime= $_POST['locationtime'];
  $description= $_POST['description'];

  //check if duplicate location name exists in the database
  if(createLocation($locationname, $xcoordinate, $ycoordinate, $locationtime, $description)){
    echo "Successfully created new location with the name of: $locationname"; 
  }else{
    echo "Error: Failed to create location. A location with the name of $locationname already exists."; 
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
        <p>Location Name:<input type="text" id="locationname" name="locationame" required></p>
      </div>
      <div class="row">
        <p>X Coordinate:<input type="number" id="xcoordinate" name="xcoordinate" required></p>
      </div>
      <div class="row">
        <p>Y Coordinate:<input type="number" id="ycoordinate" name="ycoordinate" required></p>
      </div>
      <div class="row">
        <p>Location Time (min):</p><input type="time" id="locationtime" name="locationtime" required>
      </div>
      <div class="row">
        <label for="description">Description:</label>
        <br><br>
        <textarea class="description" id="description" name="description" rows="4" cols="40"> </textarea>
      </div>
      <div class="row">
        <input type="hidden" id="pressedAdd" name="pressedAdd" value="1">
        <input type = "submit" value="Create new location">
        <a href= "main.php"> Back <a>
      </div>
    </form>
</main>
