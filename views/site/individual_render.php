<?php
use yii\helpers\Html;
?>

<section class="registration-render">
  <div class="wrapper">
    <div class="header">
      <h1>กรุณาตรวจสอบข้อมูล</h1>
      <p>หากยืนยันแล้วจะไม่สามารถแก้ไขข้อมูลได้ในภายหลัง</p>
    </div>
    <div class="registration-information">
      <div class="row clearfix">
        <p class="col-3"><span>ชื่อ - นามสกุล : </span><?= $model->firstname . ' ' . $model->lastname ?></p>
        <p class="col-1"><span>ชื่อเล่น : </span><?= $model->nickname ?></p>
        <p class="col-2"><span>อายุ : </span> <?= $model->age ?> ปี</p>
      </div>
      <div class="row clearfix">
        <p class="col-3"><span>โรงเรียน : </span> <?= $model->school ?></p>
        <p class="col-1"><span>ปีที่ : </span> <?= $model->level ?></p>
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
        <p class="col-1"><span>ตำแหน่ง : </span> <?= $model->preferred_position ?></p>
        <p class="col-1"><span>ตำแหน่ง : </span> <?= $model->preferred_position_alternative ?></p>
      </div>
      <div class="row clearfix">
        <p class="col-4"><span>ชื่อ - นามสกุลผู้ปกครอง : </span> <?= $model->guardian_name ?></p>
        <p class="col-2"><span>เบอร์โทรศัพท์ : </span> <?= $model->guardian_telephone ?></p>
      </div>
      <div class="row">
        <?php echo Html::a('ยืนยันการสมัคร', Yii::$app->urlManager->createUrl(['site/confirm', 'mode'=>'approved']), ['class'=>'button blue']); ?>
      </div>
  </div>
</section>
