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
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
    <meta property="og:url" content="http://www.fcbayernyouthcupthailand.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="FC Bayern Youth Cup 2017 by Sport Thai Bavaria" />
    <meta property="og:description" content="FC Bayern Youth Cup Thailand 2017 เปิดรับคัดเลือกเยาวชนชายจากทั่วประเทศ เพื่อตามหาเยาวชนที่มีฝีเท้าดีที่สุด 10 คน เข้าฝึกและแข่งขันรอบ World Finals ที่เมืองมิวนิคประเทศเยอมนี" />
    <meta property="og:image" content="http://www.fcbayernyouthcupthailand.com/images/facebook_sharing.jpg" />
    <title>FC Bayern Youth Cup 2017 - Sport Thai Bavaria</title>
    <link rel="icon" type="image/png" href="<?php echo Yii::getAlias('@web'); ?>/images/bayern_favicon.png" />
    <?= Html::csrfMetaTags(); ?>
    <?php $this->head(); ?>
    <script>
        var map;
        function initMap() {
          var myLatLng = {lat: 13.746639, lng: 100.573726};
          map = new google.maps.Map(document.getElementById('contact-map'), {
            zoom: 18,
            disableDefaultUI: true,
            center: myLatLng
          });
          var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
          });
        }
      </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI4tIsF3lWIfNi1L5JH9CdpLOqzy8ul4Q&callback=initMap" async defer></script>
  </head>
  <body>
  <?php $this->beginBody(); ?>

  <header>
    <div class="wrapper">
      <a href="<?php echo Yii::$app->urlManager->createUrl(['site/index']); ?>" id="logo" title="Bayern Logo"><?= Html::img('@web/images/stbheader.png'); ?></a>
      <nav role="navigation">
        <ul class="clearfix">
          <li><a href="<?php echo Yii::$app->urlManager->createUrl(['site/index']); ?>">Home</a></li>
          <li><a href="<?php echo Yii::$app->urlManager->createUrl(['site/news']); ?>">News & Updates</a></li>
          <li><a href="<?php echo Yii::$app->urlManager->createUrl(['site/youthcup']); ?>">Youth Cups</a></li>
          <li>
            <a href="#">Register</a>
            <div class="dropdown">
              <ul>
                <li><?php echo Html::a('สมัครในนามบุคคล', Yii::$app->urlManager->createUrl(['site/preregister', 'type'=>'individual'])); ?></li>
                <li><?php echo Html::a('สมัครในนามทีม', Yii::$app->urlManager->createUrl(['site/preregister', 'type'=>'team'])); ?></li>
                <li><?php echo Html::a('สมัครในนามผู้รักษาประตู', Yii::$app->urlManager->createUrl(['site/preregister', 'regtype'=>'goalkeeper'])); ?></li>
              </ul>
            </div>
          </li>
          <li><a href="<?php echo Yii::$app->urlManager->createUrl(['site/contact']); ?>">Contact</a></li>
        </ul>
      </nav>
    </div>

  </header>


  <?php echo $content; ?>


  <footer>
    <div class="wrapper">
      <div id="sponsors">
        <div class="sponsor-img">
          <img src="<?php echo Yii::getAlias('@web'); ?>/images/stbheader.png" alt="Sponsor" />
        </div>
        <div class="sponsor-img">
          <img src="<?php echo Yii::getAlias('@web'); ?>/images/footer_logo.png" alt="Sponsor" />
        </div>
        <div class="sponsor-img">
          <img src="<?php echo Yii::getAlias('@web'); ?>/images/wangkanai_black.png" alt="Sponsor" />
        </div>
      </div>
    </div>
  </footer>
  <?php $this->endBody(); ?>
  </body>
</html>

<?php $this->endPage(); ?>
