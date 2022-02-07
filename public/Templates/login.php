<?php

    if (isset($_POST['submit'])) {
        $input = $_POST['input'];
        $password = $_POST['password'];

        $logging = true;
        $result = checkLogin($input, $password);
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
    
    <?php if(isset($logging) && $result): ?>
        <p class="popup">Your login was successfull.</p>
        <audio controls autoplay hidden>
            <source src="/audio/notify-1.mp3" type="audio/mpeg">
        </audio>
    <?php elseif (isset($logging) && !$result): ?>
        <p class="popup">Your login was unsuccessfull.</p>
        <audio controls autoplay hidden>
            <source src="/audio/notify-1.mp3" type="audio/mpeg">
        </audio>
    <?php else: ?>
        <?php if(!isset($_SESSION['user'])): ?>
            <p class="popup">Login to create Tutorials or place reviews.</p>
            <audio controls autoplay hidden>
                <source src="/audio/notify-1.mp3" type="audio/mpeg">
            </audio>
        <?php else: ?>
            <p class="popup">You are already logged in.</p>
            <audio controls autoplay hidden>
                <source src="/audio/notify-1.mp3" type="audio/mpeg">
            </audio>
        <?php endif; ?>
    <?php endif; ?>

    

</body>
    <?php
            include_once "./Templates/defaults/end.php";
    ?>
</html>