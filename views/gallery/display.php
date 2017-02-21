<?php
use yii\helpers\Html;
?>

<div class="row">
  <div class="col-md-12">
    <h1><?php echo $gallery->name; ?></h1>
    <h4><?php echo $gallery->remark; ?></h4>
    <div class="image-list row">
      <div class="col-md-12">
        <h3>Images</h3>
        <div class="btn-container">
          <a href="<?php echo Yii::$app->urlManager->createUrl(['gallery/add', 'id'=>$gallery->id]); ?>" class="btn btn-primary">Add images</a>
          <a href="<?php echo Yii::$app->urlManager->createUrl(['gallery/update', 'id'=>$gallery->id]); ?>" class="btn btn-info">Edit gallery info</a>
        </div>
      </div>
      <?php foreach ($gallery->images as $image): ?>
        <div class="col-md-3 image-box">
          <div class="img-container">
            <img src="<?php echo Yii::getAlias('@web') . $image->path; ?>" alt="">
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
