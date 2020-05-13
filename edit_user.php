<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Edit User</title>
    </head>
    <script type="text/javascript">
        function editUser() {
            
        }
    </script>
    <h2>Edit User</h2>
    <form name="user-editForm" onsubmit="return editUser()" method="post" >
    <label for="users">Select User:</label>
    <select id="users">
        <?php
            $query = mysql_query("SELECT username FROM users");
            while($rowtwo = mysql_fetch_array($query)){
            }
        ?>
        <option name="users" value=<?php echo $row["id"];?>><?php echo $row["id"];?></option>
    </select>
        <p>UserID: <input type="text" id="regUserID" name="regUserID"></p>
        <p>Password: <input type="password" id="regPassword" name="regPassword"></p><br>
        <input type="hidden" id="pressedRegister" name="pressedRegister" value="1">
        <a><input type="submit" value="Submit"></a>
        <a href="login.php">Back<a>
    </form>

</main>