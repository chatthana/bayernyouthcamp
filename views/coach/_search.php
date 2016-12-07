<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CoachSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coaches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'identity_card_no') ?>

    <?= $form->field($model, 'identity_card_path') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'school') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'virtual_team') ?>

    <?php // echo $form->field($model, 'created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
