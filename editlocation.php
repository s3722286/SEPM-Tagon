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
                <a><input type = "submit" value="Show"><a>
            </div>
        </form>
        <form name = "editlocation" method="post">
            <p>Location Name:<input type="text" id="locationname" name="locationame"></p>
            <p>X Coordinate:<input type="text" id="xcoordinate" name="xcoordinate"></p>
            <p>Y Coordinate:<input type="text" id="ycoordinate" name="ycoordinate"></p>
            <p>Location Time (min):<input type="number" id="locationtime" name="locationtime" ></p>
            <label for="description">Description:</label>
            <textarea class="description" id="description" name="description" rows="4" cols="35"> </textarea>
            <br> <br>
            <input type="hidden" id="pressedAdd" name="pressedAdd" value="1">
            <input type="submit" name="edit" value="Update" />
            <input type="submit" name="delete" value="Delete" />
            <a href= "main.php"> Back <a>
        </form>
    </div>






</main>
