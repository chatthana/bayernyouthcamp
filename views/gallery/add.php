<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerJs('
  $(\'form[name="bulk-image-upload-form"]\').submit(function(e) {
    $(\'#submit-images\').hide();
    $(\'.spinner\').show();
    return true;
  });
');
?>

<div class="row">
  <div class="col-md-12">
    <h3>Add new images to the gallery "<?php echo $baseModel->name; ?>"</h3>
    <p>Please select images using the upload button below</p>
    <p><strong>Note : </strong> You can select multiple images from the dialog</p>
    <?php $form = ActiveForm::begin(['options'=>['name'=>'bulk-image-upload-form', 'enctype' => 'multipart/form-data']]); ?>
      <?= $form->field($formModel, 'imageFiles[]')->fileInput(['multiple'=>true, 'accept'=>'image/*']) ?>
      <?= Html::submitButton('Upload Images', ['id'=>'submit-images', 'class'=>'btn btn-primary']); ?>
      <i style="display:none;" class="fa fa-spinner fa-spin fa-3x fa-fw spinner"></i>
    <?php ActiveForm::end(); ?>
    <p style="color:red; margin:10px 0;">* The maximum number of files is 300 files per upload and the total upload size must not exceed 1 Gigabyte</p>
  </div>
</div>
