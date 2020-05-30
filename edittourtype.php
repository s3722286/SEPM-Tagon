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
    if(isset($_POST['removetourtypes'])){
        $tourType = $_POST['removetourtypes'];
        removeTourType($tourType);
        echo "<script>alert(\"Tour Type: $tourType Deleted Successfully\");</script>";
    }
    if(isset($_POST['changetype']) && isset($_POST['changeto'])){
        $tourType = $_POST['changetype'];
        $changedType = $_POST['changeto'];
        changeTourType($tourType, $changedType);
        echo "<script>alert(\"Tour Type: $tourType Was Changed to $changedType Successfully\");</script>";
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

            <h1> Edit Tour Type </h1>
            <form name="addtourtype" method="post">
                <label for="addtourtype">Add Tour Type:</label>
                <input type="text" id="addtourtype" name="addtourtype">
                <input type="submit" value="Add">

            </form>

        <!-- Show tour types in a drop down list -->
            <form name="removetourtypes" method="post">
                <label for="removetourtypes">Remove Tour Type:</label>
                <select name="removetourtypes" size="1">

                    <option value="" disabled selected hidden>Remove a tour type</option>

                    
                   <?php
                    $row = getAllTourTypes();
                        foreach($row as $next) {
                            echo "<option value='".$next['tourTypeName']."'>".$next['tourTypeName']."</option>";
                        }
                    ?>

                </select>
                <input type="submit" value="Remove">
            </form>
            <form name="changetypelabel" method="post">
                <div class="row">
                    <label for="changetype">Change Tour Type:</label>
                    <select name="changetype" size="1">

                    <option value="" disabled selected hidden>Select a Tour Type to Change</option>

                
                   <?php
                        $row = getAllTourTypes();
                        foreach($row as $next) {
                            echo "<option value='".$next['tourTypeName']."'>".$next['tourTypeName']."</option>";
                        }
                    ?>
                    <!-- php code is not correct -->

                </select><br>
                    <label for="changeto">Change To:</label>
                <input type="text" id="changeto" name="changeto">
                <input type = "submit" value="Change">
            </div>
            
                <a href= "main.php"> Go Back </a>
        </form>
    </div>






</main>
