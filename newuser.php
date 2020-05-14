<?php
session_start();
require_once './database.php';

// Login/Register system based on Artem's previous work for assignment 1 for Cloud Computing.

//very much not final and barebones but I have to do the same thing for three assignments ok??
   
  //checks if userID, password was set via form below and that they are not blank.
  if(isset($_POST['regUsername']) && isset($_POST['regPassword']) && strlen($_POST['regUsername']) && strlen($_POST['regPassword']) && !empty($_POST['pressedRegister'])){
    $regUsername= $_POST['regUsername'];
    $regPassword= $_POST['regPassword'];
      
     if(createUser($regUsername, $regPassword)){
        echo "Successfully created new account with the username of: $regUsername";
        header("Location: login.php");
     }else{
        echo "Error: Failed to create user. An account with the username of $regUsername already exists."; 
     }

    //redirects to login page after registration.
        //header("Location: main.php"); 
  }
?>

<main>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
  </head>
    <script src="sha256.js"></script>
    <script type="text/javascript">
        //use SHA256 to hash password before sending to server.
        function hashPass() {
            var inputPass = document.getElementById('regPassword').value;
            var hashedPass = SHA256.hash(inputPass);

            document.getElementById('regPassword').innerHTML = hashedPass;
            document.getElementById('regPassword').value = hashedPass;

            
        }
        // Pop up message to redirect the user to another page if they click "Ok" 
        // If the user clicks "Cancel" the page, the user will remain on the register page

        //The cancel function redirects to the main page *Can either leave it like that or we need to fix it*

        function confirmation() 
        {
            if(window.confirm("Do you really want to create this user?")) 
            { 
                hashPass();
            }else{
                document.getElementById('pressedRegister').innerHTML = 0;
                document.getElementById('pressedRegister').value = 0;
            }
            
        }


        </script>
    <form name="registerForm" onsubmit=confirmation() method="post" enctype="multipart/form-data">
      <h2>Register</h2>
      <feildset class ='login_form'>
        <div class="row">
          <label class="fixedwidth">Username:</label>
          <input type="text" id="regUsername" name="regUsername" required />
        </div>
        <div class="row">
          <label class="fixedwidth">Password:</label>
          <input type="password" id="regPassword" name="regPassword" required />
        </div>
        <?php
        // put if statement to check if user account it admin
        echo "<div class='row'>";
         echo "<label class='fixedwidth'>Admin:</label>";
         echo "<input type='checkbox' name='userType' value='userType' />";
        echo "</div>";
        ?>
        <div class="row">
          <input type="hidden" id="pressedRegister" name="pressedRegister" value="1">
          <input type="submit" name="submit" value="Create New Account" />
          <a href="main.php">Back<a>
        </div>
      </feildset>
    </form>
</main>