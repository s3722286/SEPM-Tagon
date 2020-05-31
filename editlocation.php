<?php
session_start();
require_once './database.php';
$row = get_all_locations()
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
            <input type="submit" name="delete" value="Delete" />
            <a href= "main.php"> Back </a>
        </form>
EndOfEditForm;
        echo $editLocationForm;
    }
?>        
    </div>






</main>
