<?php

    if (isset($_POST['submit'])) {
        
        switch ($_POST['submit']) {
            case 'Create Tutorial':
                $title = $_POST['title'];
                $description = $_POST['description'];
                createTutorial($title, $description);
                break;
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

                <?php if (isset($_SESSION['user']) && $_SESSION['user']->creator == "1"): ?>
                    <button type="button" class="dock-button tooltip bottom" dock-id="create">
                        <span class="tooltiptext">Click to open a dock in wich you can create a new tutorial</span>
                        Create Tutorial
                    </button>
                <?php endif; ?>
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

    <div class="dock-alert" id="create">
        <div class="dock-body">
            <h1>Tutorial form</h1>
            <p>Use the form beneath here to create a new tutorial template. Wich can be edited and further developt in the "Creations" tab.
                Your creation are not visible to the public until you submitted them on the "Creation" tab. Editing or remove your upload after submission is not possible either.
                However it is possible to add an updated copy of your upload to the site. To do that click the copy button.</p>
            </p>
            <form action="" method="post">
                <div>
                    <label for="title">Title:</label>
                    <input id="title" type="text" name="title">
                </div>

                <div>
                    <label for="description">Description:</label>
                    <input id="description" type="text" name="description">    
                </div>

                <div>
                    <label for="anti-minor">18+ :</label>
                    <label id="anti-minor" class="switch tooltip">
                        <span class="tooltiptext">Take a look at our guidelines to see if your content is seen as (18+)</span>
                        <input type="checkbox" name="anti-minor">
                        <span class="slider"></span>
                    </label>
                </div>
                
                <div>
                    <button type="button" class="dock-close" dock-id="create">Close</button>
                    <input name="submit" type="submit" value="Create Tutorial">
                </div>
            </form>
            
        </div>
    </div>

    <p class="popup">Dashboard</p>

</body>
    <?php
            include_once "./Templates/defaults/end.php";
    ?>
</html>