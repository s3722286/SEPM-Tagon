<?php
session_start();

// Login/Register system based on Artem's previous work for assignment 1 for Cloud Computing.

//very much not final and barebones but I have to do the same thing for three assignments ok??
   
  //checks if userID, password was set via form below and that they are not blank.
  if(isset($_POST['regUserID']) && isset($_POST['regPassword']) && strlen($_POST['regUserID']) && strlen($_POST['regPassword'])){
    $regUserid= $_POST['regUserID'];
    $regPassword= $_POST['regPassword'];
    $regString= $regUserid . ',' . $regPassword . '.';

	//writes new registered user and password to file. Doesn't check if it already exists?
	$usersfile = file_get_contents("users.txt");
        $file = fopen("users.txt" , "w");
        $usersfile = $usersfile . $regString;
        fwrite($file, $usersfile);
        fclose($file);

	//redirects to login page after registration.
    header("Location: login.php"); 

   //if user pressed register button without inputing valid name/password then they are warned.
  }else if(isset($_POST['pressedRegister'])){
        
        echo 'Username or password cannot be empty';
        unset($_POST['pressedRegister']);

        }
?>

<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Register</title>
    </head>
    <link rel="stylesheet" href="styles.css">
    <script src="sha256.js"></script>
    <script type="text/javascript">
        //use SHA256 to hash password before sending to server.
        function hashPass() {
            var inputPass = document.getElementById('regPassword').value;
            var hashedPass = SHA256.hash(inputPass);

            document.getElementById('regPassword').innerHTML = hashedPass;
            document.getElementById('regPassword').value = hashedPass;

        }
        </script>
    
    <form name="registerForm" onsubmit="return hashPass()" method="post" >

        <p>UserID:<input type="text" id="regUserID" name="regUserID"></p>
        <p>Password:<input type="password" id="regPassword" name="regPassword"></p><br>
        <input type="hidden" id="pressedRegister" name="pressedRegister" value="1">
        <a><input type="submit" value="Register"></a>

    </form>

</main>
