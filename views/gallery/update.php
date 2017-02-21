<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
  <div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>
      <?php echo $form->field($model, 'name'); ?>
      <?php echo $form->field($model, 'remark'); ?>
      <?php echo Html::submitButton('Update', ['class'=>'btn btn-primary']); ?>
    <?php ActiveForm::end(); ?>
  </div>
</div>
