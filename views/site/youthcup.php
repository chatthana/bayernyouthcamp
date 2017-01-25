<div id="main-content" class="auto">
    <div class="wrapper">
        <div class="active-album">
            <h3><?php echo $albums[0]->name; ?></h3>
            <div class="flexslider">
                <ul class="slides">
                    <?php foreach ($albums[0]->images as $img) : ?>
                        <li><img src="<?php echo $img->path; ?>" /></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="album-list clearfix">
            <?php foreach ($albums as $album) : ?>
            <div class="album-box">
                <div class="img-container">
                    <img src="<?php echo $album->images[0]->path ?>" />
                </div>
                <p><?php echo $album->name; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>