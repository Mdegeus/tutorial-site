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

        <?php foreach ($tutorials as $tutorial): ?>
            <div class="card linked" link="/tutorial/<?= $tutorial->id ?>">
                <div class="card-img-parent">
                    <img class="card-img" src="<?= $tutorial->img ?>" />
                </div>
                <div class="card-body">
                    <h1 class="card-title"><?= $tutorial->title; ?></h1>
                    <p class="card-description"><?= $tutorial->description; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>

    <p class="popup">Tutorials</p>
</body>
    <?php
            include_once "./Templates/defaults/end.php";
    ?>
</html>