<?php $this->registerJsFile('@web/js/youthcup.js'); ?>
<div id="main-content" class="auto">
    <div class="wrapper">
        <div class="active-album">
            <h3><?php echo $active_album->name; ?></h3>
            <p><?php echo $active_album->remark; ?></p>
            <div class="flexslider">
                <ul class="slides">
                    <?php foreach ($active_album->images as $img) : ?>
                        <li><img src="<?php echo Yii::getAlias('@web') . $img->path; ?>" /></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="album-list clearfix">
            <h3>อัลบั้มอื่นๆ</h3>
            <?php foreach ($albums as $album) : ?>
            <a class="album-box" href="<?php echo Yii::$app->urlManager->createUrl(['site/youthcup', 'gid' => $album->id]); ?>">
                <div class="img-container">
                    <img src="<?php echo Yii::getAlias('@web') . $album->images[0]->path ?>" />
                </div>
                <p><?php echo $album->name; ?></p>
            </a>
            <?php endforeach; ?>
        </a>
    </div>
</div>
