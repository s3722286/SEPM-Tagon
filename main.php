<?php
session_start();
require_once './database.php';

  if(isset($_SESSION['username'])){
      $username = $_SESSION['username'];
      $display_name = strtoupper($username);
      $type = getUserType($_SESSION['username']);
      echo "<h3>Welcome $display_name Role: $type</h3>";
      
  }else header("Location: login.php");

//if user clicks LogOut Button then unset their username SESSION variable and redirect to login page

  if(isset($_POST['Logout'])){
      unset($_SESSION['username']);
      echo "<script>alert(\"You have been logged out successfully\"); window.location = \"login.php\"</script>";
  }
  

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
            <a href="createtour.php">Create New Tour</a>
	    <a href="edittourtype.php">Edit Tour Type</a>
	    <a href="edittour.php">Edit Tours</a>
 	    <a href="removetour.php">Remove Tour</a>
            <input type="hidden" id="Logout" name="Logout" value="1">
        </div>
        <button type="submit" class="button"value="Logout">Logout</button>
    </form>
</body>
