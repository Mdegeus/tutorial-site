<!DOCTYPE html>
<html lang="en">

    <?php
            include_once "./Templates/defaults/head.php";
    ?>

<body>
    <?php
            include_once "./Templates/defaults/navbar.php";
    ?>

    <div class="card-container">

        <?php foreach ($creations as $creation): ?>
            <div class="card linked" link="/creation/<?= $creation->id ?>">
                <div class="card-img-parent">
                    <img class="card-img" src="<?= $creation->img ?>" />
                </div>
                <div class="card-body">
                    <h1 class="card-title"><?= $creation->title; ?></h1>
                    <p class="card-description"><?= $creation->description; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>

    <p class="popup">Creations, Here you can edit and upload your unpublished items.</p>
</body>
    <?php
            include_once "./Templates/defaults/end.php";
    ?>
</html>