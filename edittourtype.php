<?php
session_start();
require_once './database.php';

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}else{
    if(isset($_POST['addtourtype'])){
        $tourType = $_POST['addtourtype'];
        if(canAddTourType($tourType) == TRUE){
            addTourType($tourType);
            echo "<script>alert(\"Tour Type: $tourType Was successfully added\");</script>";
        }else echo "<script>alert(\"Error: A tour type with the name of $tourType already exists!\");</script>";
    }
}
?>

    <main>

        <head>
            <link rel="stylesheet" href="styles.css">
            <title>Edit Tour Types</title>
        </head>

        <script src="sha256.js"></script>
        <script type="text/javascript">
            // Pop up message to redirect the user to another page if they click "Ok" 
            // If the user clicks "Cancel" the page, the user will remain on the register page

            //The cancel function redirects to the main page *Can either leave it like that or we need to fix it*

            function confirmation() {
                if (window.confirm("Do you really want to delete this tour type?")) {
                    //delete from database
                } else {
                    //do nothing return to current page
                }

            }

        </script>
        <!--When user selects a location from dropdown list, the text boxes are filled with the existing fields from the database -->
        <!--User then can edit the field(s) they require  -->

        <!-- Drop down list containing existing locations   -->
        <div class="list">

            <h2> Edit Tour Type </h2>
            <form name="addtourtype" method="post">
                <p>Add Tour Type:<input type="text" id="addtourtype" name="addtourtype"></p>
                <input type="submit" value="Add">

            </form>
        </div>

        <!-- Show tour types in a drop down list -->
        <div class="list">
            <form name="removetourtypes" method="post">
                <select name="removetourtypes" size="1">

                    <option value="" disabled selected hidden>Remove a tour type</option>

                    <!-- php code is not correct -->
                   <?php
                        foreach($row as $next) {
                            echo "<option value='".$next['locationID']."'>".$next['locationName']."</option>";
                        }
                    ?>
                    <!-- php code is not correct -->

                </select>
                <input type="submit" value="Remove">
            </form>
        </div>

        <div class="list">
            <form name="changetypelabel" method="post">
                <div class="row">
                    <select name="changetypelabel" size="1">

                    <option value="" disabled selected hidden>Select a type label</option>

                    <!-- php code is not correct -->
                   <?php
                        foreach($row as $next) {
                            echo "<option value='".$next['locationID']."'>".$next['locationName']."</option>";
                        }
                    ?>
                    <!-- php code is not correct -->

                </select>
                    <input type = "submit" value="Show">
                <p>Change to:<input type="text" id="changeto" name="changeto"></p>

            </div>
            <input type = "submit" value="Update">
                <a href= "main.php"> Back </a>
        </form>
    </div>






</main>
