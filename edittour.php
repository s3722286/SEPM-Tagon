<?php
session_start();
require_once './database.php';

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}
 echo var_dump($_POST);
if(isset($_POST['edittour'])){
    $tourID = $_POST['tourID']; 
    $newTourName = $_POST['newtourname'];
    $newTourType = $_POST['newtourtype'];
    $newTourLoc = $_POST['tourlocations'];
    
    $locationArr = explode(',', $newTourLoc);
    
    if(isset($_POST['removelocation'])){
        array_splice($locationArr, $_POST['removelocation'], 1);
    }
    if(isset($_POST['addlocation'])){
        array_push($locationArr, $_POST['addlocation']);
    }
       
    $locations = "";
    $newMinDuration = 0;
    
    foreach($locationArr as $loc){
        if(!empty($loc)){
            $locations = $locations . $loc . ",";
            $newMinDuration = $newMinDuration + getLocationTime($loc);
        }

    }
    echo $locations;
    
    
    changeTour($tourID, $newTourName, $newTourType, $locations, $newMinDuration);
    echo "<script>alert(\"Tour $newTourName was changed!\");</script>";
}

if(isset($_POST['deletetour'])){
    $tourID = $_POST['tourID']; 
    removeTour($tourID);
    echo "<script>alert(\"Tour ID $tourID was deleted!\");</script>";
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
                    <select name="tours" size="1">
                    <option value="" disabled selected hidden>Choose a tour</option>
                    <!-- php code is not correct -->
                    <?php
                    $row = getAllTours();
                        foreach($row as $next) {
                            echo "<option value='".$next['tourID']."'>".$next['tourName']."</option>";
                        }
                    ?>
                    <!--php code is not correct -->

                </select>
                    <input type="submit" value="Show">
                </div>
            </form>

            <?php 
          if(isset($_POST['tours'])){
              $tourID = $_POST['tours'];
              $field = getTour($tourID);
              $tourName = $field['tourName'];
              $tourType = $field['tourType'];
              $tourLocations = $field['tourLocations'];
              $minDuration = $field['minDuration'];
              
              $editTourForm1 = <<<EndOfEditTourForm1
             <form name = "edittour" method="post">
             <input type="hidden" name="tourID" value="$tourID" required />
             <input type="hidden" name="tourlocations" value="$tourLocations" required />
            <p>Edit Tour Name:<input type="text" id="newtourname" name="newtourname" value="$tourName"></p>
            <p>Edit Tour Type:<input type="text" id="newtourtype" name="newtourtype" value="$tourType"></p>

              
                <label for="addlocation">Add Location:</label>
                <select name="addlocation" size="1">
                    <option value="" disabled selected hidden>Select a location</option>
EndOfEditTourForm1;
                    $row = get_all_locations();
                        foreach($row as $next) {
                            $editTourForm1 = $editTourForm1 . "<option value='".$next['locationID']."'>".$next['locationName']."</option>";
                        }
                    $editTourForm1 = $editTourForm1 . "</select>";
              
                    $editTourForm2 = <<<EndOfEditTourForm2

            <br>
            <label for="removelocation">Remove Location:</label>
            <select name="removelocation" size="1">
            <option value="" disabled selected hidden>Select a location to remove</option>
EndOfEditTourForm2;
              
                    $editTourForm1 = $editTourForm1 . $editTourForm2;

              
                    $tourLocationsArr = explode(',', $tourLocations);
                    $i = 0;
                    foreach($tourLocationsArr as $loc){
                        if(!empty($loc)){
                            $editTourForm1 = $editTourForm1 . "<option value='".$i."'>".getLocationName($loc)."</option>";
                        }
                        $i = $i + 1;

                    }

                    $editTourForm1 = $editTourForm1 . "</select>";
              
              $editTourForm3 = <<<EndOfEditTourForm3
            <br>
            <br> <br>
            <input type="submit" name="edittour" value="Update">
            <input type="submit" name="deletetour" value="Delete">
            <a href="main.php"> Back </a>
            </form>
EndOfEditTourForm3;
              
              $editTourForm1 = $editTourForm1 . $editTourForm3;
              
            echo $editTourForm1; 
         } ?>

        </div>






    </main>
