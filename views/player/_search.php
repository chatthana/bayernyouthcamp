<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchPlayers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="players-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'unique_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'nickname') ?>

    <?php // echo $form->field($model, 'birthdate') ?>

    <?php // echo $form->field($model, 'age') ?>

    <?php // echo $form->field($model, 'identity_card_no') ?>

    <?php // echo $form->field($model, 'identity_card_path') ?>

    <?php // echo $form->field($model, 'school') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'line_id') ?>

    <?php // echo $form->field($model, 'facebook_link') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'foot') ?>

    <?php // echo $form->field($model, 'pp') ?>

    <?php // echo $form->field($model, 'ppa') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'team') ?>

    <?php // echo $form->field($model, 'virtual_team') ?>

    <?php // echo $form->field($model, 'guardian_name') ?>

    <?php // echo $form->field($model, 'guardian_telephone') ?>

    <?php // echo $form->field($model, 'arena') ?>

    <?php // echo $form->field($model, 'created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
