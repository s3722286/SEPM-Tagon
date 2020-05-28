<?php
session_start();

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}

?>



<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Remove Location</title>
    </head>
     <!-- Popup message confirming with user if they really want to delete the location selected -->
    <script type="text/javascript">
     
    function confirmation() 
        {
            if(window.confirm("Do you really want to delete this location?")) 
            { 
               // Delete from database
            }else{
               // document.getElementById('pressedRegister').innerHTML = 0;
               // document.getElementById('pressedRegister').value = 0;
            }
            
        }


    </script>
     

    <!-- Drop down list containing existing locations   -->
    <div class="list">
        <form name="showlocation" method="post">
        <h2>Remove location</h2>
        <select name= "locations" size ="1">
            <option> Select Location</option>
            <option value = "location1"> Location 1 </option>
            <option value = "location2"> Location 2 </option>
            <option value = "location3"> Location 3 </option>
            <option value = "location4"> Location 4 </option>
        </select>
        <a><input type = "submit" value="Show"><a>
        </form>



        <form name = "removelocation" onsubmit= confirmation() method="post">
        <p>Location Name:<input type="text" id="locationname" name="locationame"></p>
        <p>X Coordinate:<input type="text" id="xcoordinate" name="xcoordinate"></p>
        <p>Y Coordinate:<input type="text" id="ycoordinate" name="ycoordinate"></p>
        <p>Location Time (min):<input type="number" id="locationtime" name="locationtime" ></p>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="35"> </textarea>
        <br> <br>
        <input type="hidden" id="pressedAdd" name="pressedAdd" value="1">
        <a><input type = "submit" value="Delete Location"><a>
        <a href= "main.php"> Back <a>
        </form>
    <div class="list">





</main>