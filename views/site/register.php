<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<section id="registration-content">
  <div class="wrapper">
    <div id="registration-form-container">
      <h4>กรุณากรอกข้อมูล</h4>
      <?php $form = ActiveForm::begin([
        "id"=>"registration-form"
      ]); ?>

      <ul>

        <li><?php echo $form->field($model, 'firstname'); ?></li>
        <li><?php echo $form->field($model, 'lastname'); ?></li>
        <li><?php echo $form->field($model, 'email'); ?></li>
        <li><?php echo $form->field($model, 'telephone'); ?></li>
        <li><?php echo Html::submitButton('ยืนยันการสมัคร', ['class'=>'button']) ?></li>

      </ul>

      <?php ActiveForm::end(); ?>
    </div>
  </div>
</section>
