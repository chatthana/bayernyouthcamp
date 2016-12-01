<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ArenaHelper;
use app\components\ThaiDateHelper;

// Register JS file with ClientScript (Call differently from Yii1)
$this->registerJsFile(Yii::getAlias('@web') . '/js/registration.js');
?>
<div id="main-content" class="auto">
  <section id="registration-content">
    <div class="wrapper">
      <div id="registration-form-container">

        <div class="registration-form-header">
          <!-- <div class="bayern-vertical-logo">
            <?php echo Html::img('@web/images/vertical-logo.png'); ?>
          </div> -->
          <div class="bayern-sponsored">
            <?php echo Html::img('@web/images/registration_wkn.png'); ?>
            <?php echo Html::img('@web/images/vertical_logo_2.png'); ?>
            <?php echo Html::img('@web/images/registration_stb.png'); ?>
          </div>

          <h1>สมัครในนามบุคคล <?php echo $model->pp !== 'gk' ? '':'(ผู้รักษาประตู)'; ?></h1>
        </div>

        <?php $form = ActiveForm::begin([
          "id"=>"registration-form",
          // "enableClientValidation"=>false
        ]); ?>

        <?php echo $form->errorSummary($model); ?>

        <ul>

          <li class="clearfix">
            <?php echo $form->field($model, 'identity_card_file', ['options' => ['class' => 'form-center'],
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
              <?php echo Html::dropDownList('birthyear', null, ThaiDateHelper::getYears(), ['prompt'=>'--- ปี ---', 'options'=>['class'=>'span-1']]); ?>
            </div>
            <?php echo $form->field($model, 'age', ['options'=>['class'=>'span-3'], 'inputOptions' => ['placeholder'=>$model->getAttributeLabel('age'), 'readonly'=>true]])->label(false); ?>
          </li>
          <li class="full clearfix">
            <?php echo $form->field($model, 'identity_card_no', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('identity_card_no')]])->label(false); ?>
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
            <?php echo $form->field($model, 'pp', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('pp'), 'disabled'=> ($model->pp !== 'gk') ? false:true]])->dropDownList(($model->pp !== 'gk') ? ['bk'=>'กองหลัง', 'ct'=>'กองกลาง', 'fw'=>'กองหน้า']:['gk'=>'ผู้รักษาประตู'], ['prompt'=>'--- ตำแหน่งที่ถนัด ---'])->label(false); ?>
            <?php echo ($model->ppa == 'gk') ? '' : $form->field($model, 'ppa', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('ppa')]])->dropDownList(['bk'=>'กองหลัง', 'ct'=>'กองกลาง', 'fw'=>'กองหน้า'], ['prompt'=>'--- ตำแหน่งที่ถนัด ---', 'options'=>['template'=>'<div></div>']])->label(false); ?>
          </li>
          <li class="col-3 clearfix">
            <?php echo $form->field($model, 'weight', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('weight')]])->label(false); ?>
            <?php echo $form->field($model, 'height', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('height')]])->label(false); ?>
            <?php echo $form->field($model, 'team', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('team')]])->label(false); ?>
          </li>
          <li class="col-2 clearfix">
            <?php echo $form->field($model, 'guardian_name', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('guardian_name')]])->label(false); ?>
            <?php echo $form->field($model, 'guardian_telephone', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('guardian_telephone')]])->label(false); ?>
          </li>

          <?php if ($model->pp == 'gk' && $model->ppa == 'gk'): ?>
            <?= $form->field($model, 'pp')->hiddenInput(['value'=>'gk'])->label(false); ?>
            <?= $form->field($model, 'ppa')->hiddenInput(['value'=>'gk'])->label(false); ?>
          <?php endif; ?>

          <?= $form->field($model, 'birthdate')->hiddenInput(['value'=>''])->label(false); ?>

        </ul>

        <div class="registration-form-arenas">
          <ul>
            <?= $form->field($model, 'arena')->radioList(
              $arenas
            ,[
              "item"=>function($index, $label, $name, $checked, $value) {
                $input = "<input type='radio' name=" . $name . " value=". $value . " />";
                $_label = '<label class="control-label"><div class="radio-left">'. $label .'</div><div class="radio-right">วันที่ '. ThaiDateHelper::getThaiDate(ArenaHelper::findDateByText($label)) .'</div></label>';
                return '<div class="each-radiobox clearfix"><label class="radio-label"><div class="radio-label-input-group">'.$input.'<div class="custom-radio"></div></div></label>' . $_label . "</div>";
              }
            ]
            )->label(false); ?>
          </ul>
        </div>

        <div id="remarks">
          <h5>หมายเหตุ</h5>
          <ul>
            <li><strong>ผู้สมัคร รวมถึงครอบครัวแะลผู้ติดตามยินยอมให้บันทึกภาพ โดยทางรายการจะเป็นผู้พิจารณาภาพที่จะนำไปออกอากาศทั้งหมด</strong></li>
            <li>หากมีการตรวจพบในภายหลังว่าหลักฐานและ/หรือข้อความที่ได้แจ้งไว้ในใบสมัครเป็นเท็จ หรือหลักฐานประกอบการสมัครเป็นเท็จหรือปลอม ผู้สมัครจะถูกเพิกถอนสิทธิในการรับคัดเลือกครั้งนี้ไม่ว่าผู้สมัครจะผ่านการคัดเลือกหรือไม่</li>
          </ul>
        </div>

        <div class="acceptance">
            <?php echo $form->field($model, 'accepted', ['template' => $radioTemplate])->input('radio', ['value' => 'accepted'])->label('<div class="radio-left">ข้าพเจ้าขอรับรองว่า ข้อความข้างต้นเป็นความจริงทุกประการ</div>'); ?>
        </div>

        <div class="submit-button-container">
          <?php echo Html::submitButton('สมัคร', ['class'=>'button']); ?>
        </div>

        <?php ActiveForm::end(); ?>

      </div>
    </div>
  </section>
</div>
