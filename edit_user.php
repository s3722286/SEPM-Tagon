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
        function get_selected(selectedObject) {
            this.value = sel.value;
            $row = fill_user(value);
            if($row != null) {
                $userName = $row['userName'];
                $password = $row['password'];
                $userType = $row['userType'];
            }
        }
    </script>
    <h2>Edit User</h2>
    <form name="user-editForm" onsubmit="return editUser()" method="post" >
    <label for="users">Select User:</label>
    <select id="users" onchange="get_selected(this)" required>
        <option value="" disabled selected hidden>Choose a user</option>
        <?php
            foreach($row as $next) {
                echo "<option value='".$next['userID']."'>".$next['userName']."</option>";
            }	
        ?>
    </select>
        <div class="row">
          <label class="fixedwidth">Username:</label>
          <input type="text" id="regUsername" name="regUsername" value="<?php echo $userName ?>" required />
        </div>
        <div class="row">
          <label class="fixedwidth">Password:</label>
          <input type="password" id="regPassword" name="regPassword" value="<?php echo $password ?>" required />
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