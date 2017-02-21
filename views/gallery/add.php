<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
  <div class="col-md-12">
    <h3>Add new images to the gallery "<?php echo $baseModel->name; ?>"</h3>
    <p>Please select images using the upload button below</p>
    <p><strong>Note : </strong> You can select multiple images from the dialog</p>
    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>
      <?= $form->field($formModel, 'imageFiles[]')->fileInput(['multiple'=>true, 'accept'=>'image/*']) ?>
      <?= Html::submitButton('Upload Images', ['class'=>'btn btn-primary']); ?>
    <?php ActiveForm::end(); ?>
    <p style="color:red; margin:10px 0;">* The maximum number of files is 100 files per upload</p>
  </div>
</div>
