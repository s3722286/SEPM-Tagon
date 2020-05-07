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

<body>
    <form name="logoutForm" method="post">
        <input type="hidden" id="Logout" name="Logout" value="1">
        <a><input type="submit" value="Logout"></a>
        <a href="newuser.php">Create New User<a>
    </form>
</body>
