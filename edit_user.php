<?php



?>

<main>
    <head>
        <title>Edit User</title>
    </head>
    <script type="text/javascript">
        //use SHA256 to hash password before sending to server.
        function editUser() {
            var inputPass = document.getElementById('regPassword').value;
            var hashedPass = SHA256.hash(inputPass);

            document.getElementById('regPassword').innerHTML = hashedPass;
            document.getElementById('regPassword').value = hashedPass;
        }
    </script>
    
    <form name="user-editForm" onsubmit="return hashPass()" method="post" >
    <label for="users">Select User:</label>
    <select id="users">
        <option value="user">Placeholder</option>
    </select>
        <p>UserID:<input type="text" id="regUserID" name="regUserID"></p>
        <p>Password:<input type="password" id="regPassword" name="regPassword"></p><br>
        <input type="hidden" id="pressedRegister" name="pressedRegister" value="1">
        <a><input type="submit" value="Submit"></a>
    </form>

</main>