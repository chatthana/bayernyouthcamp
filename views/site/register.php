<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ArenaHelper;
use app\components\ThaiDateHelper;
use app\components\PlayerHelper;

// Register JS file with ClientScript (Call differently from Yii1)
$this->registerJsFile(Yii::getAlias('@web') . '/js/registration.js');
$this->registerMetaTag(['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1.0']);
?>
<div id="main-content" class="auto">
  <section id="registration-content">
    <div class="registration-form-header">
      <!-- <div class="bayern-vertical-logo">
        <?php echo Html::img('@web/images/vertical-logo.png'); ?>
      </div> -->
      <div class="bayern-sponsored">
        <?php echo Html::img('@web/images/stb.png'); ?>
        <?php echo Html::img('@web/images/logo.png', ['class'=>'large']); ?>
        <?php echo Html::img('@web/images/wangkanai.png'); ?>
      </div>

    </div>

    <div class="wrapper">
      <h1 class="form-super-header">สมัครในนามบุคคล <?php echo $model->pp !== 'gk' ? '':'(ผู้รักษาประตู)'; ?></h1>
      <div id="registration-form-container">
        <?php $form = ActiveForm::begin([
            "id"=>"registration-form",
            "enableClientValidation" => true
          ]); ?>
        <?php echo $form->errorSummary($model); ?>
        <div id="arena-selector-container">
          <div class="col-12">
            <div class="form-group">
              <?php echo $form->field($model, 'arena')->dropDownList($arenas, ['prompt' => '--- กรุณาเลือกสนามที่จะลงแข่งขัน ---'])->label(false); ?>
            </div>
            <div class="submit-button-container" style="text-align:center; margin-top:0;">
              <button class="button blue">ทำรายการต่อไป</button>
            </div>
          </div>
        </div>
        <div id="main-registration-form">
          <ul>
            <li class="clearfix make-center" role="id_uploader">
              <div class="arrow-container">
                <?php echo Html::img('@web/images/right.png', ['class'=>'pulse']); ?>
              </div>
              <?php echo $form->field($model, 'identity_card_file', ['options' => ['class' => 'form-center next-to-arrow'],
                'template' =>
                '   {label}
                    <div class="id-card-uploader button green">
                      <span>อัพโหลดภาพบัตรประชาชน</span>
                      {input}
                    </div>
                '
              ])->fileInput()->label(false); ?>
            </li>

            <li class="col-2 clearfix">
              <?php echo $form->field($model, 'name', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('name')]])->label(false); ?>
              <?php echo $form->field($model, 'nickname', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('nickname')]])->label(false); ?>
            </li>
            <li class="full clearfix">
              <?php echo $form->field($model, 'name_en', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('name_en')]])->label(false); ?>
            </li>
            <li class="custom clearfix">
              <div class="form-group span-1">
                <?php echo Html::dropDownList('birthdate',null, ThaiDateHelper::getDates(), ['prompt'=>'--- วัน ---', 'options'=>['class'=>'span-1']]); ?>
              </div>
              <div class="form-group span-1">
                <?php echo Html::dropDownList('birthmonth', null, ThaiDateHelper::getMonths(), ['prompt'=>'--- เดือน ---', 'options'=>['class'=>'span-1']]); ?>
              </div>
              <div class="form-group span-1">
                <?php echo Html::dropDownList('birthyear', null, ThaiDateHelper::getYears(2002, 2003), ['prompt'=>'--- ปี ---', 'options'=>['class'=>'span-1']]); ?>
              </div>
              <?php echo $form->field($model, 'age', ['options'=>['class'=>'span-3'], 'inputOptions' => ['placeholder'=>$model->getAttributeLabel('age'), 'readonly'=>true]])->label(false); ?>
            </li>
            <li class="full clearfix">
              <?php echo $form->field($model, 'identity_card_no', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('identity_card_no'), 'maxlength' => '13']])->label(false); ?>
            </li>
            <li class="col-2 clearfix">
              <?php echo $form->field($model, 'school', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('school')]])->label(false); ?>
              <?php echo $form->field($model, 'year', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('year')]])->label(false); ?>
            </li>
            <li class="full clearfix">
              <?php echo $form->field($model, 'address', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('address')]])->label(false); ?>
            </li>
            <li class="col-3 clearfix">
              <?php echo $form->field($model, 'telephone', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('telephone')]])->label(false); ?>
              <?php echo $form->field($model, 'line_id', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('line_id')]])->label(false); ?>
              <?php echo $form->field($model, 'facebook_link', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('facebook_link')]])->label(false); ?>
            </li>
            <li class="full clearfix">
              <?php echo $form->field($model, 'email', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('email')]])->label(false); ?>
            </li>
            <li class="<?= ($model->pp == 'gk') ? 'col-2':'col-3' ?> clearfix">
              <?php echo $form->field($model, 'foot', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('foot')]])->dropDownList(['left'=>'ซ้าย', 'right'=>'ขวา'], ['prompt'=>'--- เท้าที่ถนัด ---'])->label(false); ?>
              <?php echo $form->field($model, 'pp', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('pp'), 'disabled'=> ($model->pp !== 'gk') ? false:true]])->dropDownList(($model->pp !== 'gk') ? PlayerHelper::getAllPositions(['gk']):['gk'=>'ผู้รักษาประตู'], ['prompt'=>'--- ตำแหน่งที่ถนัด ---'])->label(false); ?>
              <?php echo ($model->ppa == 'gk') ? '' : $form->field($model, 'ppa', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('ppa')]])->dropDownList(PlayerHelper::getAllPositions(['gk']), ['prompt'=>'--- ตำแหน่งที่ถนัด ---', 'options'=>['template'=>'<div></div>']])->label(false); ?>
            </li>
            <li class="col-3 clearfix">
              <?php // echo $form->field($model, 'weight', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('weight')]])->label(false); ?>
              <?php echo $form->field($model, 'weight')->dropDownList(PlayerHelper::getWeights(40, 100, "kg"), ["prompt" => "--- เลือกน้ำหนัก ---"])->label(false); ?>
              <?php echo $form->field($model, 'height')->dropDownList(PlayerHelper::getHeights(130, 200, "cm"), ["prompt" => "--- เลือกส่วนสูง ---"])->label(false); ?>
              <?php echo $form->field($model, 'team', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('team')]])->label(false); ?>
            </li>
            <li class="col-3 clearfix">
              <?php echo $form->field($model, 'guardian_name', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('guardian_name')]])->label(false); ?>
              <?php echo $form->field($model, 'guardian_telephone', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('guardian_telephone')]])->label(false); ?>
              <?php echo $form->field($model, 'source')->dropDownList(PlayerHelper::getSources(), ['prompt'=>'--- '. $model->getAttributeLabel('source') .' ---'])->label(false); ?>
            </li>

            <?php if ($model->pp == 'gk' && $model->ppa == 'gk'): ?>
              <?= $form->field($model, 'pp')->hiddenInput(['value'=>'gk'])->label(false); ?>
              <?= $form->field($model, 'ppa')->hiddenInput(['value'=>'gk'])->label(false); ?>
            <?php endif; ?>

            <?= $form->field($model, 'birthdate')->hiddenInput(['value'=>''])->label(false); ?>

          </ul>

          <div id="remarks">
            <h5>หมายเหตุ</h5>
            <ul>
              <li>
                <p>บริษัท สปอร์ตไทย-บาวาเรีย จำกัด เป็นบริษัท ใหม่ ที่ก่อตั้งด้วยความร่วมมือ ระหว่างกลุ่มวังขนายและ สโมสร บาเยิร์นมิวนิก โดยมีวัตถุประสงค์ ในการจัดการ  ให้ ความรู้ทางด้านกีฬา และ จัดกิจกรรม ทางการตลาด</p>
              </li>
              <li>
                <p>- ข้อมูลผู้สมัครเข้าร่วมโครงการทั้งหมด ทางบริษัท สปอร์ตไทย-บาวาเรีย จำกัด จะเป็น ผู้จัดเก็บอย่างปลอดภัยในฐานข้อมูล เช่น ชื่อ ,ที่อยู่,อีเมล์, เบอร์โทรศัพท์  และ ทางบริษัทสามารถทำการแชร์ข้อมูลให้กับทางสโมสร บาเยิร์น มิวนิค เพื่อที่จะทำการติดต่อและประชาสัมพันธ์เกี่ยวกับการจัดงานในอนาคต ยกเว้น แต่ผู้สมัครไม่ยินยอมให้ทางสโมสร บาเยิร์น มิวนิกใช้ข้อมูลข้างต้น สามารถ ติดต่อ ได้ที่ <strong>detenschutz@fcb.de</strong></p>
              </li>
              <li>
                <p>- ผู้สมัคร รวมถึงครอบครัวแลผู้ติดตามยินยอมให้บันทึกภาพ โดยผู้จัดจะเป็นผู้พิจารณาภาพที่จะนำไปใช้ในการประชาสัมพันธ์ ทั้งหมด</p>
              </li>
              <li>
                <p>- หากมีการตรวจพบในภายหลังว่าหลักฐานและ/หรือข้อความที่ได้แจ้งไว้ในใบสมัครเป็นเท็จ หรือหลักฐานประกอบการสมัครเป็นเท็จหรือปลอม ผู้สมัครจะถูกเพิกถอนสิทธิในการรับคัดเลือกครั้งนี้ไม่ว่าผู้สมัครจะผ่านการคัดเลือกหรือไม่</p>
              </li>
            </ul>
          </div>

          <div class="acceptance">
            <?php $radioTemplate = '<div class="radio clearfix">{input}<div class="radio-label">{label}</div>{error}</div>'; ?>
            <?php $radioTemplate = '<label class="radio-label"><div class="radio-label-input-group">{input}<div class="custom-radio"></div></div></label>{label}'; ?>
            <?php echo $form->field($model, 'accepted', ['template' => $radioTemplate])->input('radio', ['value' => 'accepted'])->label('<div class="radio-left">ข้าพเจ้าขอรับรองว่า ข้อความข้างต้นเป็นความจริงทุกประการ</div>'); ?>
          </div>

          <div class="submit-button-container">
            <?php echo Html::submitButton('สมัคร', ['class'=>'button']); ?>
          </div>
        </div>



        <?php ActiveForm::end(); ?>

      </div>
    </div>
  </section>
</div>
