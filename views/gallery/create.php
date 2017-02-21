<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
  <div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>
      <?php echo $form->field($album, 'name'); ?>
      <?php echo $form->field($album, 'remark'); ?>
      <?php echo $form->field($album, 'active')->hiddenInput(['value'=>1])->label(false); ?>
      <?php echo Html::submitButton('Create Album', ['class'=>'btn btn-primary']); ?>
    <?php ActiveForm::end(); ?>
  </div>
</div>
