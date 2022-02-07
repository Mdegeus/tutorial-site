<?php

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $logging = true;

        $result = createUser($username, $email, $password);
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
            <label for="username">Username:</label>
            <input id="username" type="text" name="username">

            <label for="email">Email:</label>
            <input id="email" type="text" name="email">

            <label for="password">Password:</label>
            <input id="password" type="password" name="password">

            <input name="submit" type="submit" value="Login">

            <a href="/login">Already have an acount? Login here.</a>
        </form>
    </div>

    <?php if(isset($logging) && $result): ?>
        <p class="popup">Your registration was successfull. You where logged in aswell.</p>
        <audio controls autoplay hidden>
            <source src="/audio/notify-1.mp3" type="audio/mpeg">
        </audio>
    <?php elseif (isset($logging) && !$result): ?>
        <p class="popup">Your registration was unsuccessfull. Please try again.</p>
        <audio controls autoplay hidden>
            <source src="/audio/notify-1.mp3" type="audio/mpeg">
        </audio>
    <?php else: ?>
        <?php if(!isset($_SESSION['user'])): ?>
            <p class="popup">Here you can create a free acount.</p>
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