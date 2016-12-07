<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Coaches */

$this->title = 'Create Coaches';
$this->params['breadcrumbs'][] = ['label' => 'Coaches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coaches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
