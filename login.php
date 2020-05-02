<?php
session_start();

// Login/Register system based on Artem's previous work for assignment 1 for Cloud Computing.

//very much not final and barebones but I have to do the same thing for three assignments ok??
 
   //if logging out then clear session variables used for login
  if(isset($_GET['logOut'])){
    unset($_GET['logOut']);
    unset($_SESSION['userID']);
  }

  if(isset($_POST['userID']) && isset($_POST['password'])){
    $userid= $_POST['userID'];
    $password= $_POST['password'];
    $loginString= $userid . ',' . $password;
	
	//turns userfile into an array of usernames and passwords separated by a comma
    $users= explode(".",file_get_contents('users.txt'));
    $arraylength = count($users);
	
    //searches though array of username/password strings until something matches.
	for($i=0;$i<$arraylength;$i++){

          if($users[$i] == $loginString){
             $_SESSION['userID']=$userid;
             header("Location: main.php"); 
           }
        }
      //if user is not redirected then it is assumed that they input wrong password.
      echo '<p>Username or password is invalid</p>';
  }
?>

<main>
   <head>
     <title>Login</title>
   </head>
    
    <script src="sha256.js"></script>
    <script type="text/javascript">
        //use SHA256 to hash password before sending to server.
        function hashPass() {
            var inputPass = document.getElementById('password').value;
            var hashedPass = SHA256.hash(inputPass);

            document.getElementById('password').innerHTML = hashedPass;
            document.getElementById('password').value = hashedPass;

        }
        </script>
    
    <form name="loginForm" onsubmit="return hashPass()" method="post">

        <p>UserID:<input type="text" id="userID" name="userID"></p><br>
        <p>Password:<input type="password" id="password" name="password"></p><br>
        <a><input type="submit"  value="Login"></a>
        <a href="register.php">Register<a>

    </form>

</main>