<?php
session_start();

//if userID is set then 

  if(isset($_POST['Logout'])){
      unset($_SESSION['username']);
      //Skips alert box obviously
      //echo "<script>alert(\"You have been logged out successfully\")</script>";
  }

  if(isset($_SESSION['username'])){
      $username = $_SESSION['username'];
      echo "<head><h1>Welcome $username</h1></head>";
      
  }else header("Location: login.php");
  
//if user clicks LogOut Button then unset their userID SESSION variable and redirect to loginpage
  

?>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Main Menu</title>
  </head>
<body>
    <form name="logoutForm" method="post">
        <h2>Main Menu</h2>
        <feildset class ='login_form'>
        <div class="row">
            <a href="newuser.php"> 1. Create New User<a>
        </div>
        <div class="row">
        <a href="edit_user.php"> 2. Edit User<a>
        </div>
        <div class="row">
        <a href="addlocation.php"> 3. Add Location<a>
        </div>
        <div class="row">
        <a href="editlocation.php"> 4. Edit Location<a>
        </div>
        <div class="row">
        <a href="removelocation.php"> 5. Remove Location<a>
        </div>
        <br></br>
        <input type="hidden" id="Logout" name="Logout" value="1">
        <a><input type="submit" value="Logout"></a>
    </form>
</body>
