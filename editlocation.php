<?php
session_start();





?>



<main>
    <h1> Edit Location </h1>





    <!-- Drop down list containing existing locations   -->
    <form name="showlocation" method="post">
    <select name= "locations" size ="1">
        <option> Select Location</option>
        <option value = "location1"> Location 1 </option>
        <option value = "location2"> Location 2 </option>
        <option value = "location3"> Location 3 </option>
        <option value = "location4"> Location 4 </option>
    </select>
    <a><input type = "submit" value="Show"><a>
    </form>

    <!--When user selects a location from dropdown list, the text boxes are filled with the existing fields from the database -->
    <!--User then can edit the field(s) they require  -->
    
    <form name = "editlocation" method="post">
    <p>Location Name:<input type="text" id="locationname" name="locationame"></p>
    <p>X Coordinate:<input type="text" id="xcoordinate" name="xcoordinate"></p>
    <p>Y Coordinate:<input type="text" id="ycoordinate" name="ycoordinate"></p>
    <p>Location Time (min):<input type="number" id="locationtime" name="locationtime" ></p>
    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" cols="40"> </textarea>
    <br> <br>
    <input type="hidden" id="pressedAdd" name="pressedAdd" value="1">
    <a><input type = "submit" value="Update"><a>
    <a href= "main.php"> Back <a>



    </form>






</main>
