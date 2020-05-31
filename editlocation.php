<?php
session_start();
require_once './database.php';

if(isset($_POST['edit'])){ 
    $locationID = $_POST['locationID']; 
    $locationName = $_POST['locationname']; 
    $xCoord = $_POST['xcoordinate']; 
    $yCoord = $_POST['ycoordinate']; 
    $description = $_POST['description']; 
    // Min time is calculated assuming each word in description will take half a second to pronounce by the robot 
    // If odd number of words an extra half second is added to minimal time to be spent at a location 
    $minTime= ceil(0.5 * str_word_count($description)); 
     
    if(updateLocation($locationID, $locationName, $xCoord, $yCoord, $minTime, $description)){ 
        echo "<script>alert(\"$locationName was successfully edited\");</script>"; 
    }else{ 
        echo "<script>alert(\"Error: $locationName was NOT changed\");</script>"; 
    } 
} 

if(isset($_POST['copy'])){
  $oldLocName = $_POST['locationname'];
  $locationname= $_POST['locationname'];
    
  //When copying a location if the name is not changed then new name becomes "Copy x of LocationName"
  //If Copy 1 of Location already exists the copy number will increment until a copy with number does not already exist
  //Supports massive amount of copies without having to rename each one manually
  $validName = FALSE;
  $copyNumber = 1;
   while($validName == FALSE){
      if(canCreateLocation($locationname) == TRUE){
        $validName = TRUE;
      }else{
          $locationname = "Copy $copyNumber of $oldLocName";
          $copyNumber = $copyNumber + 1;
      } 
   }
    
  $xcoordinate= $_POST['xcoordinate'];
  $ycoordinate= $_POST['ycoordinate'];
  $description= $_POST['description'];
  // Location time is calculated assuming each word in description will take half a second to pronounce by the robot
  // If odd number of words an extra half second is added to minimal time to be spent at a location
  $locationtime= ceil(0.5 * str_word_count($description));
    
  if(createLocation($locationname, $xcoordinate, $ycoordinate, $locationtime, $description) !== FALSE){
    echo "<script> alert(\"Successfully copied new location with the name of: $locationname\");</script>"; 
  }else{
    echo "<script> alert(\"Error: Failed to copy location.\");</script>"; 
  }
}

if(isset($_POST['delete'])){
    $locationID = $_POST['locationID'];
    $locationName = $_POST['locationname'];

    if(deleteLocation($locationID)){
        echo "<script>alert(\"$locationName was successfully deleted\");</script>";
    }else{
        echo "<script>alert(\"Error: $locationName was NOT deleted\");</script>";
    }
}

$row = get_all_locations();
?>



<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Edit Location</title>
    </head>

    <!--When user selects a location from dropdown list, the text boxes are filled with the existing fields from the database -->
    <!--User then can edit the field(s) they require  -->

    <!-- Drop down list containing existing locations   -->
    <div class="list">
        <form name="showlocation" method="post">
            <h2> Edit Location </h2>
            <div class="row">
                <select name= "locations" size ="1">
                    <option value="" disabled selected hidden>Choose a location</option>
                    <?php
                        foreach($row as $next) {
                            echo "<option value='".$next['locationID']."'>".$next['locationName']."</option>";
                        }
                    ?>
                </select>
                <a><input type = "submit" value="Show"></a>
                <a href= "main.php"> Back </a>
            </div>
        </form>
 <?php       
        
    if(isset($_POST['locations'])){
        $locationID = $_POST['locations'];
        $field = get_location($locationID);
        $locationName = $field['locationName'];
        $xCoord = $field['xCoordinate'];
        $yCoord = $field['yCoordinate'];
        $description = $field['description'];
        
        $editLocationForm = <<<EndOfEditForm

        <form name = "editlocation" method="post">
            <input type="hidden" id="locationID" name="locationID" value="$locationID">
            <label for="locationname">Location Name:</label>
            <input type="text" id="locationname" name="locationname" value="$locationName"><br>
            <label for="ycoordinate">X Coordinate:</label>
            <input type="text" id="xcoordinate" name="xcoordinate" value="$xCoord"><br>
            <label for="ycoordinate">Y Coordinate:</label>
            <input type="text" id="ycoordinate" name="ycoordinate" value="$yCoord"><br>
            <label for="description">Description:</label><br>
            <textarea class="description" id="description" name="description" rows="4" cols="30">$description</textarea>
            <br> <br>
            <input type="submit" name="edit" value="Update" />
            <input type="submit" name="copy" value="Copy" />
            <input type="submit" name="delete" value="Delete" />
            <a href= "main.php"> Back </a>
        </form>
EndOfEditForm;
        echo $editLocationForm;
    }
?>        
    </div>






</main>
