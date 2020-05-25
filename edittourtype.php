<?php
session_start();

?>

<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Edit Tour Type</title>
    </head>

    <script src="sha256.js"></script>
    <script type="text/javascript">
       
        // Pop up message to redirect the user to another page if they click "Ok" 
        // If the user clicks "Cancel" the page, the user will remain on the register page

        //The cancel function redirects to the main page *Can either leave it like that or we need to fix it*

        function confirmation() 
        {
            if(window.confirm("Do you really want to delete this tour type?")) 
            { 
                //delete from database
            }else{
                //do nothing return to current page
            }
            
        }
        </script>
    <!--When user selects a location from dropdown list, the text boxes are filled with the existing fields from the database -->
    <!--User then can edit the field(s) they require  -->

    <!-- Drop down list containing existing locations   -->
    <div class="list">
        <form name="edittourtype" method="post">
            <h2> Edit Tour Type </h2>
            
        </form>
        <form name = "edittourtype" method="post">
        
            <form name ="addtourtpe" method="post">
            <p>Add Tour Type:<input type="text" id="addtourtype" name="addtourtype"></p>
            <a><input type = "submit" value="Add"><a>
            </div>
            </form>

        <!-- Show tour types in a drop down list -->
	<div class="list">
        <form name="removetourtypes" method="post">
                <select name= "removetourtypes" size ="1">

                    <option value="" disabled selected hidden>Remove a tour type</option>

                    <!-- php code is not correct -->
                   <?php
                        foreach($row as $next) {
                            echo "<option value='".$next['locationID']."'>".$next['locationName']."</option>";
                        }
                    ?>
                    <!-- php code is not correct -->

                </select>
                <a><input type = "submit" value="Remove"><a>
            </div>

        </form> 


        <div class="list">
        <form name="changetypelabel" method="post">
            <div class="row">
                <select name= "changetypelabel" size ="1">

                    <option value="" disabled selected hidden>Select a type label</option>

                    <!-- php code is not correct -->
                   <?php
                        foreach($row as $next) {
                            echo "<option value='".$next['locationID']."'>".$next['locationName']."</option>";
                        }
                    ?>
                    <!-- php code is not correct -->

                </select>
                <a><input type = "submit" value="Show"><a>
                <p>Change to:<input type="text" id="changeto" name="changeto"></p>

            </div>
            <a><input type = "submit" value="Update"><a>
            <a href= "main.php"> Back <a>
        </form>
    </div>






</main>