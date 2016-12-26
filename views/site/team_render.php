<?php
use yii\helpers\Html;
use app\components\PlayerHelper;
?>

<section id="main-content" class="auto">
  <section class="registration-render">
  <div class="registration-form-header">
    <div class="bayern-sponsored">
      <?php echo Html::img('@web/images/stb.png'); ?>
      <?php echo Html::img('@web/images/logo.png', ['class'=>'large']); ?>
      <?php echo Html::img('@web/images/wangkanai.png'); ?>
    </div>
  </div>
  <div class="wrapper">
    <div class="header">
      <h1>กรุณาตรวจสอบข้อมูล</h1>
      <p>หากยืนยันแล้วจะไม่สามารถแก้ไขข้อมูลได้ในภายหลัง</p>
    </div>
    <div class="registration-information">
      <!-- For coach -->
      <div id="team-coach-render-zone">
        <div class="row">
          <h3>โค้ช / อาจารย์</h3>
        </div>
        <div class="row clearfix">
          <p class="col-2"><span>ชื่อ - นามสกุล : </span><?= $coachModel->name ?></p>
          <p class="col-2"><span>ชื่อ - นามสกุล (อังกฤษ) : </span><?= $coachModel->name_en ?></p>
          <p class="col-2"><span>อายุ : </span> <?= $coachModel->age ?> ปี</p>
        </div>
        <div class="row clearfix">
          <p class="col-3"><span>รหัสบัตรประชาชน : </span><?= $coachModel->identity_card_no ?></p>
          <p class="col-3"><span>เบอร์โทรศัพท์ : </span><?= $coachModel->telephone ?></p>
        </div>
        <div class="row clearfix">
          <p class="col-6"><span>โรงเรียน / สังกัด : </span> <?= $coachModel->address ?></p>
        </div>
        <div class="row clearfix">
          <p class="col-6"><span>ที่อยู่ปัจจุบัน : </span> <?= $coachModel->address ?></p>
        </div>
      </div>

      <div id="team-member-render-zone">
        <?php foreach ($models as $index => $model): ?>
          <div class="each-member">
            <h3>ผู้เล่นที่ <?php echo $index + 1; ?></h3>
            <div class="row clearfix">
              <p class="col-2"><span>ชื่อ - นามสกุล : </span><?= $model->name ?></p>
              <p class="col-2"><span>ชื่อ - นามสกุล (อังกฤษ) : </span><?= $model->name_en ?></p>
              <p class="col-2"><span>อายุ : </span> <?= $model->age ?> ปี</p>
            </div>
            <div class="row clearfix">
              <p class="col-3"><span>โรงเรียน : </span> <?= $model->school ?></p>
              <p class="col-1"><span>ปีที่ : </span> <?= $model->year ?></p>
              <p class="col-1"><span>น้ำหนัก : </span> <?= $model->weight ?> kg</p>
              <p class="col-1"><span>ส่วนสูง : </span> <?= $model->height ?> cm</p>
            </div>
            <div class="row clearfix">
              <p class="col-6"><span>ที่อยู่ปัจจุบัน : </span> <?= $model->address ?></p>
            </div>
            <div class="row clearfix">
              <p class="col-2"><span>เบอร์โทรศัพท์ที่ติดต่อได้ : </span> <?= $model->telephone ?></p>
              <p class="col-2"><span>LINE ID : </span> <?= $model->line_id ?></p>
              <p class="col-2"><span>Email : </span> <?= $model->email ?></p>
            </div>
            <div class="row clearfix">
              <p class="col-4"><span>Facebook : </span> <?= $model->facebook_link ?></p>
              <p class="col-1"><span>ตำแหน่ง : </span> <?= PlayerHelper::getPosition($model->pp) ?></p>
              <p class="col-1"><span>ตำแหน่ง : </span> <?= PlayerHelper::getPosition($model->ppa) ?></p>
            </div>
            <div class="row clearfix">
              <p class="col-4"><span>ชื่อ - นามสกุลผู้ปกครอง : </span> <?= $model->guardian_name ?></p>
              <p class="col-2"><span>เบอร์โทรศัพท์ : </span> <?= $model->guardian_telephone ?></p>
            </div>
            <div class="row clearfix">
              <p class="col-6"><span>เบอร์โทรศัพท์ : </span> <?= $model->guardian_telephone ?></p>
            </div>
          </div>
        <?php endforeach; ?>
          <div class="row" style="text-align:center; margin-top:35px;">
            <?php echo Html::a('ยืนยันการสมัคร', Yii::$app->urlManager->createUrl(['site/confirm', 'confirmtype'=>'team']), ['class'=>'button blue']); ?>
            <?php echo Html::a('กลับไปแก้ไข', Yii::$app->urlManager->createUrl(['site/registerteam', 'requesttype'=>'edit']), ['class'=>'button red']); ?>
          </div>
      </div>
  </div>
</section>
</section>
