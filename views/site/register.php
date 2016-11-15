<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<section id="registration-content">
  <div class="wrapper">
    <div id="registration-form-container">

      <div id="registration-form-header">
        <div class="bayern-vertical-logo">
          <?php echo Html::img('@web/images/vertical-logo.png'); ?>
        </div>
        <div class="bayern-wangkanai">
          <?php echo Html::img('@web/images/wangkanai_black.png'); ?>
        </div>
      </div>

      <?php $form = ActiveForm::begin([
        "id"=>"registration-form",
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
          <?php echo $form->field($model, 'birthdate', ['options' => ['class' => 'form-group span-2-6'], 'inputOptions' => ['placeholder' => $model->getAttributeLabel('birthdate')]])->input('date')->label(false); ?>
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
        <li class="col-4 clearfix">
          <?php echo $form->field($model, 'email', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('email')]])->label(false); ?>
          <?php echo $form->field($model, 'foot', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('foot')]])->label(false); ?>
          <?php echo $form->field($model, 'preferred_position', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('preferred_position')]])->label(false); ?>
          <?php echo $form->field($model, 'preferred_position', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('preferred_position')]])->label(false); ?>
        </li>
        <li class="col-2 clearfix">
          <?php echo $form->field($model, 'guardian_name', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('guardian_name')]])->label(false); ?>
          <?php echo $form->field($model, 'guardian_telephone', ['inputOptions' => ['placeholder' => $model->getAttributeLabel('guardian_telephone')]])->label(false); ?>
        </li>
        <li><?php echo Html::submitButton('ยืนยันการสมัคร', ['class'=>'button']) ?></li>

      </ul>

      <div id="registration-form-arenas">
        <ul>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">กรุงเทพมหานคร ณ สนามธรรมศาสตร์ รังสิต</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดเชียงราย ณ สนามยูไนเต็ด สเตเดี้ยม</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดภูเก็ต ณ สนามกีฬาสุระกุล</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดนครราชสีมา ณ สนามราชสีมาวิทยาลัย</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดขอนแก่น ณ สนามวิทยาลัยบัณฑิตเอเชีย</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดนครสวรรค์ ณ สนามโรงเรียนกีฬาจังหวัดนครสวรรค์</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดสุพรรณบุรี ณ สนามโรงเรียนกีฬาจังหวัดสุพรรณบุรี</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดเชียงใหม่ ณ สนามกีฬาเทศบาลเมืองเชียงใหม่</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดระยอง ณ สนามกีฬาพีทีทีสเตเดี้ยม</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">จังหวัดราชบุรี ณ สนามค่ายภานุรังสี</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>
          <li class="clearfix">
            <?php echo $form->field($model, 'arena')->radio(['label'=>'<div class="radio-left">กรุงเทพมหานคร ณ สนามกีฬาธรรมศาสตร์ รังสิต</div><div class="radio-right">วันที่ 23 มกราคม 2560</div>'])->label(false); ?>
          </li>

        </ul>
      </div>

      <?php ActiveForm::end(); ?>
    </div>
  </div>
</section>
