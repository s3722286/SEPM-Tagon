<?php
session_start();
//require_once './database.php';


    //php not accurate or fully completed as database is not integrated 


/*
    
if(isset($_POST['locationname']) && isset($_POST['xcoordinate']) && isset($_POST['ycoordinate']) && isset($_POST['locationtime']) && isset($_POST['description'])){
    $locationname= $_POST['locationname'];
    $xcoordinate= $_POST['xcoordinate'];
    $ycoordinate= $_POST['ycoordinate'];
    $locationtime= $_POST['locationtime'];
    $description= $_POST['description'];

    //check if duplicate location name exists in the database
     if(createLocation($locationname)){
        echo "Successfully created new location with the name of: $locationname"; 
     }else{
        echo "Error: Failed to create user. An location with the name of $locationname already exists."; 
     }
     

   //if user pressed "Create new location" button without inputing all valid fields then they are warned.
  }else if(isset($_POST['pressedAdd']) && !empty($_POST['pressedAdd'])){
        
    echo 'All fields must be entered';
    unset($_POST['pressedAdd']);

  }

*/

?>


<main>
    <h1> Add new location </h1>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Add Location</title>
    </head>




    <script type="text/javascript">
   

    </script>

    <form name="addlocation" method="post">
    <p>Location Name:<input type="text" id="locationname" name="locationame"></p>
    <p>X Coordinate:<input type="text" id="xcoordinate" name="xcoordinate"></p>
    <p>Y Coordinate:<input type="text" id="ycoordinate" name="ycoordinate"></p>
    <p>Location Time (min):<input type="number" id="locationtime" name="locationtime" ></p>
    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" cols="40"> </textarea>
    <br> <br>
    <input type="hidden" id="pressedAdd" name="pressedAdd" value="1">
    <a><input type = "submit" value="Create new location"><a>
    <a href= "main.php"> Back <a>
    </form>

</main>