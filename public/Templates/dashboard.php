<?php

    if (isset($_POST['submit'])) {
        
        switch ($_POST['submit']) {
            case 'Set Email':
                if (!findUser($_POST['email'])) {
                    changeUserEmail($_POST['email']);
                }
                break;
            case 'Set Creator':
                changeCreator(isset($_POST['developer']));
                break;
            case 'Set Username':
                if (!findUser($_POST['username'])) {
                    changeUserName($_POST['username']);
                }
                break;
        }


    }

    if (isset($_SESSION['user'])) { /// because the dashboard always needs all user data, reload when visit.
        updateCurrentUserData();
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php
            include_once "./Templates/defaults/head.php";
    ?>

<body>
    <?php
            include_once "./Templates/defaults/navbar.php";
    ?>

    <div class="full column left">

        
        <form action="" method="post">

            <div>
                <label for="developerl">I want to be a Creator:</label>
                <label id="developerl" class="switch">
                    <input type="checkbox" name="developer" <?php if ($_SESSION['user']->creator == "1") { echo "checked=true value=true"; } else { echo ""; } ?>>
                    <span class="slider"></span>
                </label>
            </div>

            <input name="submit" type="submit" value="Set Creator">

            <div>
                <label for="username">Change Username:</label>
                <input id="username" type="text" name="username">
            </div>

            <input name="submit" type="submit" value="Set Username">

            <div>
                <label for="email">Change Email:</label>
                <input id="email" type="text" name="email">
            </div>

            <input name="submit" type="submit" value="Set Email">

        </form>

        
    </div>

</body>
    <?php
            include_once "./Templates/defaults/end.php";
    ?>
</html>