<?php

    if (isset($_POST['submit'])) {
        $input = $_POST['input'];
        $password = $_POST['password'];

        checkLogin($input, $password);
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

    <div class="center-content full">
        <form action="" method="post" class="column center">
            <label for="input">Username/Email:</label>
            <input id="input" type="text" name="input">

            <label for="password">Password:</label>
            <input id="password" type="password" name="password">

            <input name="submit" type="submit" value="Login">

            <a href="/register">Click here to create a free acount.</a>
        </form>
    </div>

</body>
    <?php
            include_once "./Templates/defaults/end.php";
    ?>
</html>