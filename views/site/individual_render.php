<?php
use yii\helpers\Html;
use app\components\PlayerHelper;
$this->registerJsFile(Yii::getAlias('@web') . '/js/preconfirm.js');
?>

<section id="main-content" class="auto">
  <div class="registration-form-header">
    <div class="bayern-sponsored">
      <?php echo Html::img('@web/images/stb.png'); ?>
      <?php echo Html::img('@web/images/logo.png', ['class'=>'large']); ?>
      <?php echo Html::img('@web/images/wangkanai.png'); ?>
    </div>
  </div>
  <section class="registration-render">
  <div class="wrapper">
    <div class="header">
      <h1>กรุณาตรวจสอบข้อมูล</h1>
      <p>หากยืนยันแล้วจะไม่สามารถแก้ไขข้อมูลได้ในภายหลัง</p>
    </div>
    <div class="registration-information">
      <div class="row">
        <div class="img-container">
          <img src="<?php // echo Yii::getAlias('@web') . '/uploads/identity_cards/' . $filename . '.' . $model->identity_card_file->extension ?>" alt="" />
        </div>
      </div>
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
        <p class="col-3"><span>สนามแข่งขัน : </span> <?= \app\components\ArenaHelper::getArenaName($model->arena) ?></p>
        <p class="col-3"><span>เบอร์โทรศัพท์ : </span> <?= $model->guardian_telephone ?></p>
      </div>
  </div>
</section>
<div class="registration-toolset">
  <div class="row">
    <div class="chd info">
      <h3>กรุณารอสักครู่</h3>
      <p style="color:red;">กรุณารอสักครู่ ระบบกำลังดำเนินการกับข้อมูลของท่าน<br/>กรุณาอย่ากดออก กด Refresh หรือดำเนินการใดๆกับเว็บเพจโดยเด็ดขาด</p>
      <div class="chd-spinner"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>
    </div>
  </div>
  <div id="presubmit-operation-container" class="row" style="text-align:center; margin-top:35px;">
    <?php if ($arena->requires_id_photocopy) : ?>
      <?php echo Html::a('ยืนยันการสมัคร', Yii::$app->urlManager->createUrl(['site/confirm', 'filename'=> $filename]), ['class'=>'button blue', 'id'=>'submit-confirm']); ?>
    <?php else : ?>
      <?php echo Html::a('ยืนยันการสมัคร', Yii::$app->urlManager->createUrl(['site/confirm']), ['class' => 'button blue', 'id' => 'submit-confirm']); ?>
    <?php endif; ?>
  </div>
</div>
</section>
