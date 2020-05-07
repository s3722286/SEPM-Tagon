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
     }else{
        echo "Error: Failed to create user. An account with the username of $regUsername already exists."; 
     }

    //redirects to login page after registration.
        //header("Location: main.php"); 
    

   //if user pressed register button without inputing valid name/password then they are warned.
  }else if(isset($_POST['pressedRegister']) && !empty($_POST['pressedRegister'])){
        
    echo 'Username or password cannot be empty';
    unset($_POST['pressedRegister']);

  }else{
	  
	echo 'User creation was canceled';
	unset($_POST['pressedRegister']);
	
  }
?>

<main>
   <head>
     <title>Register</title>
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
    
    <form name="registerForm" onsubmit=confirmation() method="post" >

        <p>UserID:<input type="text" id="regUsername" name="regUsername"></p>
        <p>Password:<input type="password" id="regPassword" name="regPassword"></p><br>
        <input type="hidden" id="pressedRegister" name="pressedRegister" value="1">
        <a><input type="submit" value="Create new account"></a>
        <a href="main.php">Back<a>

    </form>
</main>