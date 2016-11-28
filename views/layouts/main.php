<?php
use yii\helpers\Html;
use app\assets\BayernAsset;

BayernAsset::register($this);
$this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
  <head>
    <meta charset="utf-8">
    <title>Bayern Munchen Youth Camp 2016</title>
    <?= Html::csrfMetaTags(); ?>
    <?php $this->head(); ?>
  </head>
  <body>
  <?php $this->beginBody(); ?>

  <header>
    <div class="wrapper">
      <a id="logo" title="Bayern Logo"><?= Html::img('@web/images/logo.png'); ?></a>
      <nav role="navigation">
        <ul class="clearfix">
          <li><a href="#">Home</a></li>
          <li><a href="#">News & Updates</a></li>
          <li><a href="#">Youth Cups</a></li>
          <li>
            <a href="#">Register</a>
            <div class="dropdown">
              <ul>
                <li><?= Html::a('สมัครในนามบุคคล', Yii::$app->urlManager->createUrl(['site/preregister', 'type'=>'individual'])); ?></li>
                <li><?= Html::a('สมัครในนามทีม', Yii::$app->urlManager->createUrl(['site/preregister', 'type'=>'team'])); ?></li>
                <li><?= Html::a('สมัครในนามผู้รักษาประตู', Yii::$app->urlManager->createUrl(['site/preregister', 'regtype'=>'goalkeeper'])); ?></li>
              </ul>
            </div>
          </li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>

  </header>


  <?php echo $content; ?>


  <footer>
    <div class="wrapper">
      <div id="sponsors">
        <div class="sponsor-img">
          <img src="<?php echo Yii::getAlias('@web'); ?>/images/stb.png" alt="Sponsor" />
        </div>
        <div class="sponsor-img">
          <img src="<?php echo Yii::getAlias('@web'); ?>/images/footer_logo.png" alt="Sponsor" />
        </div>
        <div class="sponsor-img">
          <img src="<?php echo Yii::getAlias('@web'); ?>/images/wangkanai.png" alt="Sponsor" />
        </div>
      </div>
    </div>
  </footer>
  <?php $this->endBody(); ?>
  </body>
</html>

<?php $this->endPage(); ?>
