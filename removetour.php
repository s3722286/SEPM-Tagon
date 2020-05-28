<?php
session_start();

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}
?>

<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Remove Tour</title>
    </head>
     <!-- Popup message confirming with user if they really want to delete the location selected -->
    <script type="text/javascript">
     
    function confirmation() 
        {
            if(window.confirm("Do you really want to delete this tour?")) 
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
        <form name="showtour" method="post">
        <h2>Remove tour</h2>
        <select name= "tours" size ="1">
            <option> Select Tour</option>
            <option value = "location1"> tour 1 </option>
            <option value = "location2"> tour 2 </option>
            <option value = "location3"> tour 3 </option>
            <option value = "location4"> tour 4 </option>
        </select>
        <a><input type = "submit" value="Show"><a>
        </form>



        <form name = "removelocation" onsubmit= confirmation() method="post">
        <p>Tour Name:<input type="text" id="tourname" name="tourname"></p>
        <p>Tour Type:<input type="text" id="tourtype" name="tourtype"></p>
        <p>Duration:<input type="number" id="duration" name="duration"> </p>

        <label for="locationnames">Location Names:</label>
        <textarea id="locationnames" name="locationnames" rows="4" cols="25"> </textarea>
        <br> <br>
        <input type="hidden" id="pressedAdd" name="pressedAdd" value="1">
        <a><input type = "submit" value="Delete Tour"><a>
        <a href= "main.php"> Back <a>
        </form>
    <div class="list">
