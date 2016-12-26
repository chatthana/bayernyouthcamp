<?php
use yii\helpers\Html;
use app\components\ThaiDateHelper;
use app\components\PlayerHelper;
use app\components\ArenaHelper;
?>
<div class="global-sponsored-header">
  <?php echo Html::img('@web/images/registration_wkn.png'); ?>
  <?php echo Html::img('@web/images/vertical_logo_2.png'); ?>
  <?php echo Html::img('@web/images/registration_stb.png'); ?>
  <div class="header">
    <h3>ใบสมัครเข้าร่วมกิจกรรม</h3>
    <h3>FC Bayern Youth Cup 2017</h1>
  </div>
</div>
<div class="content">
  <div class="information">
    <h5 style="font-size:1.25em;"><span>รหัสโค้ช / อาจารย์ :</span> <?= $model->getPrimaryKey(); ?></h5>
    <h5><span>สนาม :</span> <?= ArenaHelper::getArenaName($arena) ?></h5>
    <h5><span>วันที่ทำการคัดเลือก :</span> <?= ThaiDateHelper::getThaiDate(ArenaHelper::getApplicationDate($arena)) ?></h5>
    <h5><span>รหัสทีม (กรณีสมัครในนามทีม) :</span> <?php echo $model->virtual_team !== null ? $model->virtual_team : '-' ?></h5>
  </div>
  <div class="details">
    <div>
      <p class="col-3"><span>ชื่อ :</span> <?= $model->name ?></p>
      <p class="col-3"><span>ชื่อ (อังกฤษ) :</span> <?= $model->name_en ?></p>
    </div>
    <div>
      <p class="col-2">เบอร์โทรศัพท์ :</span> <?= $model->telephone ?></p>
      <p class="col-2"><span>อายุ :</span> <?= $model->age ?> ปี</p>
      <p class="col-2"><span>เลขที่บัตรประชาชน :</span> <?= $model->identity_card_no ?></p>
    </div>
    <div>
      <p class="col-6"><span>โรงเรียน / สังกัด :</span> <?= $model->school ?></p>
    </div>
    <div>
      <p class="col-6"><span>ที่อยู่ :</span> <?= $model->address ?></p>
    </div>
  </div>
  </div>
</div>
<section class="remark">
  <h3>*หมายเหตุ</h3>
  <p>- ข้อมูลผู้สมัครเข้าร่วมโครงการทั้งหมด ผู้จัดสามารถจะทำการแชร์ข้อมูลให้กับทางสโมสร บาเยิร์น มิวนิค เพื่อที่จะทำการติดต่อและประชาสัมพันธ์เกี่ยวกับการจัดงานในอนาคต และยังสามารถใช้ข้อมูลส่งผ่านทางสื่อต่างๆ เช่น ข้อความในเชิงพาณิชย์อิเล็กทรอนิกส์(อีเมล)</p>
  <p>- ผู้สมัคร รวมถึงครอบครัวแะลผู้ติดตามยินยอมให้บันทึกภาพ โดยทางรายการจะเป็นผู้พิจารณาภาพที่จะนำไปออกอากาศทั้งหมด</p>
  <p>- หากมีการตรวจพบในภายหลังว่าหลักฐานและ/หรือข้อความที่ได้แจ้งไว้ในใบสมัครเป็นเท็จ หรือหลักฐานประกอบการสมัครเป็นเท็จหรือปลอม ผู้สมัครจะถูกเพิกถอนสิทธิในการรับคัดเลือกครั้งนี้ไม่ว่าผู้สมัครจะผ่านการคัดเลือกหรือไม่</p>
</section>
