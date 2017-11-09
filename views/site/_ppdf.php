<?php
use yii\helpers\Html;
use app\components\ThaiDateHelper;
use app\components\PlayerHelper;
use app\components\ArenaHelper;
?>
<section class="global-sponsored-header">
  <?php echo Html::img('@web/images/registration_wkn.png'); ?>
  <?php echo Html::img('@web/images/vertical_logo_2.png'); ?>
  <?php echo Html::img('@web/images/registration_stb.png'); ?>
  <div class="header">
    <h3>ใบสมัครเข้าร่วมกิจกรรม</h3>
    <h3>FC Bayern Youth Cup 2018</h1>
  </div>
</section>
<section class="content">
  <div class="information">
    <h5><span>รหัสผู้สมัคร :</span> <?= $model->getPrimaryKey(); ?></h5>
    <h5><span>สนาม :</span> <?= ArenaHelper::getArenaName($arena) ?></h5>
    <h5><span>วันที่ทำการคัดเลือก :</span> <?= ThaiDateHelper::getThaiDate(ArenaHelper::getApplicationDate($arena)) ?></h5>
    <h5><span>รหัสทีม (กรณีสมัครในนามทีม) :</span> <?php echo $model->virtual_team !== null ? $model->virtual_team : '-' ?></h5>
  </div>
  <div class="details">
    <div>
      <p class="col-2"><span>ชื่อ :</span> <?= $model->name ?></p>
      <p class="col-2"><span>ชื่อ (อังกฤษ) :</span> <?= $model->name_en ?></p>
      <p class="col-2"><span>ชื่อเล่น :</span> <?= $model->nickname ?></p>
    </div>
    <div>
      <p class="col-2"><span>วันเกิด :</span> <?= ThaiDateHelper::getThaiDate($model->birthdate) ?></p>
      <p class="col-2"><span>อายุ :</span> <?= $model->age ?> ปี</p>
      <p class="col-2"><span>เลขที่บัตรประชาชน :</span> <?= $model->identity_card_no ?></p>
    </div>
    <div>
      <p class="col-2"><span>ตำแหน่งที่ถนัด :</span> <?= PlayerHelper::getPosition($model->pp) ?></p>
      <p class="col-2"><span>ตำแหน่งที่ถนัด(2) :</span> <?= PlayerHelper::getPosition($model->ppa) ?></p>
    </div>
    <div>
      <p class="col-2"><span>ส่วนสูง :</span> <?= $model->height ?> cm</p>
      <p class="col-2"><span>น้ำหนัก :</span> <?= $model->weight ?> kg</p>
      <p class="col-2"><span>เท้าที่ถนัด :</span> <?= $model->foot ?></p>
    </div>
    <div>
      <p class="col-3"><span>โรงเรียน :</span> <?= $model->school ?></p>
      <p class="col-3"><span>ชั้นปีที่ :</span> <?= $model->year ?></p>
    </div>
    <div>
      <p><span>ที่อยู่ :</span> <?= $model->address ?></p>
    </div>
    <div>
      <p class="col-2">เบอร์โทรศัพท์ :</span> <?= $model->telephone ?></p>
      <p class="col-2">LINE ID :</span> <?= $model->line_id ?></p>
      <p class="col-2">Email :</span> <?= $model->email ?></p>
    </div>
    <div>
      <p class="col-3"><span>Facebook :</span> <?= $model->facebook_link ?></p>
      <p class="col-3"><span>ทีม / สังกัด :</span> <?= $model->team ?></p>
    </div>
    <div>
    <div>
      <p class="col-3"><span>ชื่อผู้ปกครอง :</span> <?= $model->guardian_name ?></p>
      <p class="col-3"><span>เบอร์โทรศัพท์ผู้ปกครอง :</span> <?= $model->guardian_telephone ?></p>
    </div>
  </div>
  </div>
</section>
