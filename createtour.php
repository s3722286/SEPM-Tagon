<?php
session_start();
require_once './database.php';

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}

if(isset($_POST['create'])){
    $name = $_POST['tourname'];
    $type = $_POST['showtype'];
    $locationArr = $_POST['locations'];
    $locations = "";
    $minDuration = 0;
    
    foreach($locationArr as $loc){
        $locations = $locations . $loc . ",";
        $minDuration = $minDuration + getLocationTime($loc);
    }
    //echo var_dump(explode(',', $locations));
    //$locations = "1,2,3"; 
    //$minDuration = $_POST[''];
    createTour($name, $type, $locations, $minDuration);
    echo "<script>alert(\"Tour $name was created!\");</script>";
}

?>

    <script>
        function addLocationInput() {
            var div = document.getElementById('loclist');

            var label = document.createElement("label");
            label.setAttribute('for', 'showtype');
            label.innerHTML = 'Add Location:';
            
            var selection = document.createElement("select");
            selection.setAttribute('name', 'locations[]');
            selection.setAttribute('size', 1);
            selection.setAttribute('required', true);

            var option = document.createElement("option");
            option.value = '';
            option.innerHTML = 'Select a location';
            option.setAttribute('disabled', true);
            option.setAttribute('selected', true);
            option.setAttribute('hidden', true);
            
            selection.appendChild(option);
            
            <?php
              $row = get_all_locations();
                  foreach($row as $next) {
                      $locID = $next['locationID'];
                      $locName = $next['locationName'];
                      
                      //<label for="showtype">Add Locations:</label>
                      //echo "var label = document.createElement(\"label\");";
                      //echo "label.innerHTML = 'Add Location:';";
                      //echo "selection.appendChild(label);";
                      echo "var option = document.createElement(\"option\");";
                      echo "option.value = '$locID';";
                      echo "option.innerHTML = '$locName';";
                      echo "selection.appendChild(option);";
                  }
            ?>

            //var typeDiv = document.getElementById('tourTypeDiv');
            //var tourTypeDivIndex = form.childNodes.length - 9;
            //console.log(form.childNodes[tourTypeDivIndex]);
            
            var br = document.createElement("br");
            
            div.appendChild(label);
            div.appendChild(selection);
            div.appendChild(br);

        }

    </script>
    <main>

        <head>
            <link rel="stylesheet" href="styles.css">
            <title>Create New Tour</title>
        </head>
        <form name="createtour" id="createtour" method="post">
            <h2> Create New Tour </h2>
            <div class="row">
                <p>Tour Name:<input type="text" id="tourname" name="tourname" required></p>
            </div>
            <!--Since a tour can have multiple locations, find a way to have the dropdown box duplicate itself if a location is selected?? -->
            <div class="loclist" id="loclist">
                <div class="row" id="locationDiv">
                    <label for="showtype">Add Location:</label>
                    <select name="locations[]" size="1" required>
                    <option value="" disabled selected hidden>Select a location</option>

                    <?php
                    $row = get_all_locations();
                        foreach($row as $next) {
                            echo "<option value='".$next['locationID']."'>".$next['locationName']."</option>";
                        }
                    ?>
                </select>
                </div>
            </div>
            <br>
            <button onclick="addLocationInput()">Add Another Location</button>

            <div class="rowlist">
                <label for="showtype">Type of Tour:</label>
                <select name="showtype" size="1">
                    <option value="" disabled selected hidden>Add a tour type</option>
                    
                    <?php
                    $row = getAllTourTypes();
                        foreach($row as $next) {
                            echo "<option value='".$next['tourTypeName']."'>".$next['tourTypeName']."</option>";
                        }
                    ?>
                    
                </select>
            </div>
            <!-- Automatically calculates the time of all locations added up
                    <div class="row">
                        <p>Duration:<input type="number" id="duration" name="duration" required></p>
                    </div> -->

            <div class="row">
                <input type="submit" name="create" value="Create new tour">
                <a href="main.php"> Back </a>
            </div>

        </form>
    </main>
