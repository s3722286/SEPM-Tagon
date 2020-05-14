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
        <div class="vertical-menu">
            <a href="newuser.php">Create New User</a>
            <a href="edit_user.php">Edit User</a>
            <a href="addlocation.php">Add Location</a>
            <a href="editlocation.php">Edit Location</a>
            <a href="removelocation.php">Remove Location</a>
            <input type="hidden" id="Logout" name="Logout" value="1">
        </div>
        <button type="submit" class="button"value="Logout">Logout</button>
    </form>
</body>
