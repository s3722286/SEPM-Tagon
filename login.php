<?php
session_start();
//include_once('initDB.php');
require_once './database.php';

// Login/Register system based on Artem's previous work for assignment 1 for Cloud Computing.

//very much not final and barebones but I have to do the same thing for three assignments ok??
 
   //if logging out then clear session variables used for login
  if(isset($_GET['logOut'])){
    unset($_GET['logOut']);
    unset($_SESSION['username']);
  }

  if(isset($_POST['username']) && isset($_POST['password'])){
    $username= $_POST['username'];
    $password= $_POST['password'];

      if(validateLogin($username,$password) == TRUE){
          echo validateLogin($username,$password);
         $_SESSION['username'] = $username;
         header("Location: main.php"); 
       }else{
          echo '<p>Username or password is invalid</p>';
      }
      
    }
      
?>

<main>
  <head>
    <link rel="stylesheet" href="styles.css">
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
    <h2>Login</h2>
    <feildset class ='login_form'>
      <div class="row">
        <label class="fixedwidth">Username:</label>
        <input type="text" name="username" required />
      </div>
      <div class="row">
        <label class="fixedwidth">Password:</label>
        <input type="password" id ="password" name="password" required />
      </div>
      <div class="row">
        <input type="submit" name="submit" value="Login" />
        <a href="newuser.php">Signup</a>
      </div>
    </feildset>
    </form>

</main>