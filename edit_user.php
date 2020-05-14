<?php
    require_once './database.php';
    $row = get_all_users(); 
?>

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
    <select id="users" required>
        <option value="" disabled selected hidden>Choose a user</option>
        <?php
            foreach($row as $next) {
                echo "<option value='".$next['userID']."'>".$next['userName']."</option>";
            }	
        ?>
    </select>
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
    </form>

</main>