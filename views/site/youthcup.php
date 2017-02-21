<?php $this->registerJsFile('@web/js/youthcup.js'); ?>
<div id="main-content" class="auto">
    <div class="wrapper">
        <div class="active-album">
            <h3><?php echo $active_album->name; ?></h3>
            <div class="flexslider">
                <ul class="slides">
                    <?php foreach ($active_album->images as $img) : ?>
                        <li><img src="<?php echo Yii::getAlias('@web') . $img->path; ?>" /></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="album-list clearfix">
            <?php foreach ($albums as $album) : ?>
            <a class="album-box" href="<?php Yii::$app->urlManager->createUrl('site/youthcup', ['gid' => $album->id]); ?>">
                <div class="img-container">
                    <img src="<?php echo Yii::getAlias('@web') . $album->images[0]->path ?>" />
                </div>
                <p><?php echo $album->name; ?></p>
            </div>
            <?php endforeach; ?>
        </a>
    </div>
</div>
