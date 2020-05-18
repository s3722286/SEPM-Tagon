<?php
require_once './database.php';
    if(isset($_POST['submit'])) {
        $regUsername= "admin";
        $regPassword= $_POST['regPassword'];
        $userType = "Admin";
        if(createUser($regUsername, $regPassword, $userType)){
            header("Location: login.php");
        } else{
            echo "Error: Failed to fill DB"; 
         }
    }
?>
<script src="sha256.js"></script>
    <script type="text/javascript">
        //use SHA256 to hash password before sending to server.
        function hashPass() {
            var hashedPass = SHA256.hash("123");

            document.getElementById('regPassword').innerHTML = hashedPass;
            document.getElementById('regPassword').value = hashedPass;
        }
    </script>
</script>
<main>
    <head>
        <title>Fill Database</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <form onsubmit=hashPass() method="post">
            <div class="row">
                <label for="title">Fill Database</label>
                <input type="submit" value="Submit">
                <input type="hidden" id="regPassword" name="regPassword" value="">
            </div>
        </form>
    </body>
</main>