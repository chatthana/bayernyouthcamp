<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Arenas */

$this->title = 'Create Arenas';
$this->params['breadcrumbs'][] = ['label' => 'Arenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arenas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'regionFilter' => $regionFilter,
    ]) ?>

</div>
