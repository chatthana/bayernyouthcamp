<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
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


        <h1>สมัครในนามบุคคล <?php echo $model->preferred_position === null ? '':'(ผู้รักษาประตู)'; ?></h1>
      </div>

      <?php $form = ActiveForm::begin([
        "id"=>"registration-form",
        // "enableClientValidation"=>false
      ]); ?>

      <ul>

        <li class="clearfix">
          <?php echo $form->field($model, 'identity_card', ['options' => ['class' => 'form-center'],
            'template' =>
            '   {label}
                <div class="id-card-uploader button green">
                  <span>อัพโหลดภาพบัตรประชาชน</span>
                  {input}
                </div>
             '
          ])->fileInput()->label(false); ?>
        </li>

        <li class="col-3 clearfix">
          <?php echo $form->field($model, 'firstname', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('firstname')]])->label(false); ?>
          <?php echo $form->field($model, 'lastname', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('lastname')]])->label(false); ?>
          <?php echo $form->field($model, 'nickname', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('nickname')]])->label(false); ?>
        </li>
        <li class="clearfix">
          <?php echo $form->field($model, 'birthdate', ['options' => ['class' => 'form-group span-2-6'], 'inputOptions' => ['class' => 'datepicker','placeholder' => $model->getAttributeLabel('birthdate')]])->label(false); ?>
          <?php echo $form->field($model, 'age', ['options' => ['class' => 'form-group span-2-6'], 'inputOptions' => ['placeholder' => $model->getAttributeLabel('age')]])->label(false); ?>
          <?php echo $form->field($model, 'weight', ['options' => ['class' => 'form-group span-1-6'], 'inputOptions' => ['placeholder' => $model->getAttributeLabel('weight')]])->label(false); ?>
          <?php echo $form->field($model, 'height', ['options' => ['class' => 'form-group span-1-6'], 'inputOptions' => ['placeholder' => $model->getAttributeLabel('height')]])->label(false); ?>
        </li>
        <li class="clearfix">
          <?php echo $form->field($model, 'school', ['options' => ['class' => 'form-group span-5-6'], 'inputOptions' => ['placeholder' => $model->getAttributeLabel('school')]])->label(false); ?>
          <?php echo $form->field($model, 'level', ['options' => ['class' => 'form-group span-1-6'], 'inputOptions' => ['placeholder' => $model->getAttributeLabel('level')]])->label(false); ?>
        </li>
        <li class="clearfix">
          <?php echo $form->field($model, 'address', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('address')]])->label(false); ?>
        </li>
        <li class="col-3 clearfix">
          <?php echo $form->field($model, 'telephone', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('telephone')]])->label(false); ?>
          <?php echo $form->field($model, 'line_id', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('line_id')]])->label(false); ?>
          <?php echo $form->field($model, 'facebook_link', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('facebook_link')]])->label(false); ?>
        </li>
        <li class="<?= ($model->preferred_position === null) ? 'col-4':'col-3' ?> clearfix">
          <?php echo $form->field($model, 'email', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('email')]])->label(false); ?>
          <?php echo $form->field($model, 'foot', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('foot')]])->dropDownList(['left'=>'ซ้าย', 'right'=>'ขวา'], ['prompt'=>'--- เท้าที่ถนัด ---'])->label(false); ?>
          <?php echo $form->field($model, 'preferred_position', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('preferred_position'), 'disabled'=> ($model->preferred_position === null) ? false:true]])->dropDownList(['gk'=>'ผู้รักษาประตู', 'bk'=>'กองหลัง', 'ct'=>'กองกลาง', 'fw'=>'กองหน้า'], ['prompt'=>'--- ตำแหน่งที่ถนัด ---'])->label(false); ?>
          <?php echo ($model->preferred_position_alternative !== null) ? '': $form->field($model, 'preferred_position_alternative', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('preferred_position_alternative')]])->dropDownList(['bk'=>'กองหลัง', 'ct'=>'กองกลาง', 'fw'=>'กองหน้า'], ['prompt'=>'--- ตำแหน่งที่ถนัด ---', 'options'=>['template'=>'<div></div>']])->label(false); ?>
        </li>
        <li class="col-2 clearfix">
          <?php echo $form->field($model, 'guardian_name', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('guardian_name')]])->label(false); ?>
          <?php echo $form->field($model, 'guardian_telephone', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('guardian_telephone')]])->label(false); ?>
        </li>

      </ul>

      <div id="registration-form-arenas">
        <ul>
          <?php $radioTemplate = '<div class="radio clearfix">{input}<div class="radio-label">{label}</div>{error}</div>'; ?>
          <?php $radioTemplate = '<label class="radio-label"><div class="radio-label-input-group">{input}<div class="custom-radio"></div></div></label>{label}'; ?>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'tu1'])->label('<div class="radio-left">กรุงเทพมหานคร ณ สนามกีฬาธรรมศาสตร์ รังสิต</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'chr'])->label('<div class="radio-left">จังหวัดเชียงราย ณ สนามยูไนเต็ด สเตเดี้ยม</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'phk'])->label('<div class="radio-left">จังหวัดภูเก็ด ณ สนามกีฬาสุระกุล</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'nrs'])->label('<div class="radio-left">จังหวัดนครราชสีมา ณ สนามราชสีมาวิทยาลัย</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'khk'])->label('<div class="radio-left">จังหวัดขอนแก่น ณ สนามวิทยาลัยบัณฑิตเอเชีย</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'nks'])->label('<div class="radio-left">จังหวัดนครสวรรค์ ณ สนามโรงเรียนกีฬาจังหวัดนครสวรรค์</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'sbr'])->label('<div class="radio-left">จังหวัดสุพรรณบุรี ณ สนามโรงเรียนกีฬาจังหวัดสุพรรณบุรี</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'chm'])->label('<div class="radio-left">จังหวัดเชียงใหม่ ณ สนามกีฬาเทศบาลเมืองเชียงใหม่</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'ray'])->label('<div class="radio-left">จังหวัดระยอง ณ สนามกีฬาพีทีทีสเตเดี้ยม</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value'=>'rbr'])->label('<div class="radio-left">จังหวัดราชบุรี ณ สนามค่ายภานุรังสี</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena', ['template' => $radioTemplate])->input('radio', ['value' => 'tu2'])->label('<div class="radio-left">กรุงเทพมหานคร ณ สนามกีฬาธรรมศาสตร์ รังสิต</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'); ?>
          </li>

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
