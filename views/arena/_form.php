<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Arenas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alert alert-info">
    <p><strong>หมายเหตุ :</strong> หากต้องการให้ผู้ใช้อัพโหลดรูปภาพบัตรประชาชนในการสมัคร กรุณาเลือก Require photocopy of the identity card</p>
</div>

<div class="arenas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reg_date')->textInput() ?>

    <?= $form->field($model, 'last_reg_date')->textInput() ?>

    <?= $form->field($model, 'region_id')->dropDownList($regionFilter) ?>

    <?= $form->field($model, 'active')->dropDownList(['1'=>'on', '0'=>'off']) ?>

    <div class="form-group">
        <?= $form->field($model, 'requires_id_photocopy')->checkbox(); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
