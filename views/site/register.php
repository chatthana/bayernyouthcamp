<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\ThaiDateHelper;
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
          <li class="col-2 clearfix">
            <?php echo $form->field($model, 'birthdate', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('birthdate'), 'class'=>'datepicker']])->label(false); ?>
            <?php echo $form->field($model, 'age', ['inputOptions' => ['placeholder'=>$model->getAttributeLabel('age')]])->label(false); ?>
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
            <?php echo ($model->ppa == 'gk') ? '': $form->field($model, 'ppa', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('ppa')]])->dropDownList(['bk'=>'กองหลัง', 'ct'=>'กองกลาง', 'fw'=>'กองหน้า'], ['prompt'=>'--- ตำแหน่งที่ถนัด ---', 'options'=>['template'=>'<div></div>']])->label(false); ?>
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

        </ul>

        <div id="registration-form-arenas">
          <ul>
            <?php $radioTemplate = '<div class="radio clearfix">{input}<div class="radio-label">{label}</div>{error}</div>'; ?>
            <?php $radioTemplate = '<label class="radio-label"><div class="radio-label-input-group">{input}<div class="custom-radio"></div></div></label>{label}'; ?>
            <?php foreach ($arenas as $arena): ?>
              <li class="clearfix">
                <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>$arena->code])->label('<div class="radio-left">'. $arena->text .'</div><div class="radio-right">วันที่ '. ThaiDateHelper::getThaiDate($arena->reg_date) .'</div>'); ?>
              </li>
            <?php endforeach; ?>
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

  <script type="text/javascript">
    $('.datepicker').datepicker({
      'dateFormat': 'yy-mm-dd'
    });

    $('#registration-form-arenas input[type=radio]').change(function() {
      $('#registration-form-arenas ul > li .radio-label-input-group').removeClass('checked');
      $('#registration-form-arenas ul > li label + label').css('color', 'inherit');
      $(this).parent().addClass('checked');
      $(this).parent().parent().next().css('color', '#961933');
    });

    $('#registration-form input[type=file]').change(function(e) {
      $('#id-card-uploader').css('background-color', '#dadada');
    });

    $('.acceptance input[type=radio]').change(function(e) {
      $('.acceptance .radio-label-input-group').removeClass('checked');
      $(this).parent().addClass('checked');
    });
  </script>
</div>
