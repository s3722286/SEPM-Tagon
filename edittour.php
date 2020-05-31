<?php
session_start();

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}
?>

<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Edit Tour</title>
    </head>

    <!--When user selects a location from dropdown list, the text boxes are filled with the existing fields from the database -->
    <!--User then can edit the field(s) they require  -->

    <!-- Drop down list containing existing locations   -->
    <div class="list">
        <form name="showtours" method="post">
            <h2> Edit Tours </h2>
            <div class="row">
                <select name= "tours" size ="1">
                    <option value="" disabled selected hidden>Choose a tour</option>
                    <!-- php code is not correct -->
                    <?php
                        foreach($row as $next) {
                            echo "<option value='".$next['locationID']."'>".$next['locationName']."</option>";
                        }
                    ?>
                    <!--php code is not correct -->

                </select>
                <a><input type = "submit" value="Show"><a>
            </div>
        </form>
        <form name = "edittour" method="post">
        <!-- Edit tour name will show the current tour name when the user displays a tour-->
            <p>Edit Tour Name:<input type="text" id="newtourname" name="newtourname"></p>
            <p>Add Location:<input type="text" id="addlocation" name="addlocation"></p>

            <!-- Tours may contain more than 1 location, delete locations - display as a drop down list??? --> 
            <p>Remove Location: <input type="text" id="removelocation" name="removelocation"></p>
            <label for="tourlocations">Locations in the Tour:</label>
            <textarea class="description" id="tourlocations" name="tourlocations" rows="4" cols="30"> </textarea>
            <br> <br>
            <input type="hidden" id="pressedAdd" name="pressedAdd" value="1">
            <input type = "submit" value="Update">
            <input type = "submit" value="Delete">
            <a href= "main.php"> Back <a>
        </form>
    </div>






</main>
