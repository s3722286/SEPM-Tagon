<?php
    session_start();
    require_once './database.php';
    $row = get_all_users();

    echo var_dump($_POST);
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        
    }else if( isset($_POST['userID']) ) {
        $userID = $_POST['userID'];
        $field = fill_user($userID);
        $userID = $field['userID'];
        $userName = $field['userName'];
        $password = $field['password'];
        $userType = $field['userType'];
        if( $userType == "Admin") {
            $checked = "checked";
        }else $checked = "";
    }
    if( isset($_POST['delete']) || isset($_POST['edit'])) {
        commitEdit();
    }
    function commitEdit() {
        if (isset($_POST['delete'])) {
            $userID = $_POST['userID'];
            deleteUser($userID);
        } else {
            echo "<p>Edit</p>";
            $regUsername= $_POST['regUsername'];
            $regPassword= $_POST['regPassword'];
            $userType = "Admin";
            $userID = $_POST['userID'];
            editUser($regUsername, $regPassword, $userType, $userID);
        }
    }
?>

<main>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Edit User</title>
    </head>
    
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
    
    <form name="user-selectForm" method="post" enctype="multipart/form-data" >
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
<?php if(isset($_POST['userID'])){
    $EditForm = <<<EndOfEditForm
    <form name="user-editForm" onsubmit="return hashPass()" action="edit_user.php" method="post" >
        <div class="row">
          <label class="fixedwidth">ID:</label>
          <label class="fixedwidth">$userID</label>
          <input type="hidden" name="userID" value="$userID" required />
        </div>
        <div class="row">
          <label class="fixedwidth">Username:</label>
          <input type="text" id="regUsername" name="regUsername" value="$userName" required />
        </div>
        <div class="row">
          <label class="fixedwidth">Password:</label>
          <input type="password" id="regPassword" name="regPassword" value="$password" required />
        </div>
        <div class='row'>
            <label class='fixedwidth'>Admin:</label>
            <input type='checkbox' name='userType' value='userType' $checked/>
        </div>
        <div class="row">
          <input type="hidden" id="pressedRegister" name="pressedRegister" value="1">
          <input type="submit" name="edit" value="Commit Edit" />
          <input type="submit" name="delete" value="Delete User" />
          <a href="main.php">Back<a>
        </div>
    </form>
EndOfEditForm;
    echo $EditForm;
}
            ?>

</main>