<?php
session_start();

if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
}

?>

<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Create New Tour</title>
    </head>
    <form name="createtour" method="post">
      <h2> Create New Tour </h2>
      <div class="row">
        <p>Tour Name:<input type="text" id="tourname" name="tourname" required></p>
      </div>
      <!--Since a tour can have multiple locations, find a way to have the dropdown box duplicate itself if a location is selected?? -->
      <div class="list">
            <div class="row">
                <select name= "addlocations" size ="1">
                    <option value="" disabled selected hidden>Add a location</option>
                </select>
                <a><input type = "submit" value="Add"><a>
            </div>
       
        <div class="list">
            <div class="row">
                <select name= "showtype" size ="1">
                    <option value="" disabled selected hidden>Add a tour type</option>
                </select>
                <a><input type = "submit" value="Add"><a>
            </div>
     <!-- Automatically calculates the time of all locations added up -->
      <div class="row">
        <p>Duration:<input type="number" id="duration" name="duration" required></p>
      </div>
      
      <div class="row">
        <input type="hidden" id="pressedAdd" name="pressedAdd" value="1">
        <a><input type = "submit" value="Create new tour"><a>
        <a href= "main.php"> Back <a>
      </div>
    </form>
</main>