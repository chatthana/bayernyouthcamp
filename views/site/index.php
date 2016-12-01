<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="main-content">
  <section id="teaser" class="clearfix">
    <div class="left">
      <?php echo Html::img('@web/images/teaser.jpg'); ?>
    </div>
    <div class="right">
      <div class="content-box reveal">
        <h3>เปิดรับสมัครแล้ว วันนี้!</h3>
        <p>
          <!-- Fc Bayern Youth Cup Thailand 2017<br/> รายการที่ค้นหา นักเตะอายุระหว่าง 14-15 ปี<br/> (พ.ศ.2544-2545) เข้ารับการคัดเลือกนักเตะที่ดีที่สุด<br/>จากทีมงานและผู้ฝึกสอนจาก Fc Bayern Munich<br/>ยอดทีมจากประเทศเยอรมัน -->
          Fc Bayern Youth Cup Thailand 2017 รายการที่ค้นหา นักเตะอายุระหว่าง 14-15 ปี (พ.ศ.2544-2545) เข้ารับการคัดเลือกนักเตะที่ดีที่สุดจากทีมงานและผู้ฝึกสอนจาก Fc Bayern Munich ยอดทีมจากประเทศเยอรมนี
        </p>
        <div class="submit-operation">
          <?php echo Html::a('สมัครเข้าร่วมกิจกรรม', Yii::$app->urlManager->createUrl('site/register'), ['class'=>['button', 'bayern']]); ?>
          <?php echo Html::a('สมัครเป็นทีม', Yii::$app->urlManager->createUrl(['site/registerteam']), ['class'=>['button', 'bayern']]); ?>
          <?php echo Html::a('สมัครผู้รักษาประตู', Yii::$app->urlManager->createUrl(['site/register', 'regtype'=>'gk']), ['class'=>['button', 'bayern']]); ?>
        </div>
      </div>
    </div>
  </section>
</div>
