<!DOCTYPE html>
<html lang="en">

    <?php
            include_once "./Templates/defaults/head.php";
    ?>

<body>
    <?php
            include_once "./Templates/defaults/navbar.php";
    ?>

    <!-- <img src="<?= $tutorial->img ?>" /> -->
    <h1><?= $tutorial->title ?></h1>
    <p><?= $tutorial->description ?></p>

    <?php foreach ($items as $item): ?>
        <div class="item-container">
            <div class="item">
                <div class="card-body">
                    <h1 class="card-title"><?= $item->title; ?></h1>
                    <p class="card-description"><?= $item->content; ?></p>
                </div>
                <a class="tooltip media-container" href="#media-<?= $item->id; ?>">
                    <?php
                        $media_id = "media-$item->id";
                    ?>
                    <?php if($item->video): ?>
                        <?php if($item->img): ?>
                            <img src="<?= $item->img; ?>" alt="">
                        <?php else: ?>
                            <img src="/img/defaultIcons/video.svg" alt="">
                        <?php endif; ?>
                        <span class="tooltiptext">Click to enlarge the video</span>
                    <?php elseif($item->img): ?>
                        <img src="<?= $item->img; ?>" alt="">
                        <span class="tooltiptext">Click to enlarge the image</span>
                    <?php else: ?>
                        <span class="tooltiptext">No media file included</span>
                    <?php endif; ?>
                </a>

                <?php if($item->img || $item->video): ?>
                    <div id="<?= $media_id; ?>" class="media">
                        <?php if($item->video): ?>
                            <video class="media-tag" width="320" height="240" controls src="<?= $item->video; ?>" alt=""></video>
                        <?php elseif($item->img): ?>
                            <img class="media-tag" src="<?= $item->img; ?>" alt=""/>
                        <?php endif; ?>
                        <a href="#" class="media-close" media-id="<?= $media_id; ?>">X</a>
                    </div>     
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>


</body>
    <?php
            include_once "./Templates/defaults/end.php";
    ?>
</html>