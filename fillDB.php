<?php
require_once './database.php';

?>
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
            </div>
        </form>
    </body>
</main>