<?php
    require_once './database.php';
    $row = get_all_users();

    function get_selected() {
        $userID = $_POST['userID'];
        $field = fill_user($userID);
        echo "<p>get_selected</p>";
        if($field != null) {
            echo "<p>Field is not null</p>";
            $userName = $field['userName'];
            $password = $field['password'];
            $userType = $field['userType'];
        }
    }
?>

<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Edit User</title>
    </head>
    <form name="user-selectForm" onsubmit=get_selected() method="post" enctype="multipart/form-data" >
        <h2>Edit User</h2>
        <div class="row">
            <select name="userID" required>
                <option value="" disabled selected hidden>Choose a user</option>
                <?php
                    foreach($row as $next) {
                        echo "<option value='".$next['userID']."'>".$next['userName']."</option>";
                    }	
                ?>
            </select>
            <input type="submit" name="select" value="select" />
        </div>
    </form>
    <form name="user-editForm" onsubmit="return editUser()" method="post" >
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
          <input type="submit" name="submit" value="Commit Edit" />
          <input type="submit" name="submit" value="Delete User" />
          <a href="main.php">Back<a>
        </div>
    </form>

</main>