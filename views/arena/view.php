<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Arenas */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Arenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arenas-view">

    <h3><?= Html::encode($model->text) ?></h3>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'text:ntext',
            // 'reg_date',
            [
              'attribute' => 'Registration Date',
              'value' => date('F jS, Y', strtotime($model->reg_date)),
            ],
            // 'last_reg_date',
            [
              'attribute' => 'Last Registration Date',
              'value' => date('F jS, Y', strtotime($model->last_reg_date)),
            ],
            [
              'attribute' => 'Region',
              'value' => \app\components\ArenaHelper::getRegionValue($model->region_id),
            ],
            [
              'attribute' => 'Activation Status',
              'value' => $model->active ? '<span class="label label-success">On</span>':'<span class="label label-danger">Off</span>',
              'format' => 'html',
            ],
            [
              'attribute' => 'ID Card Regulation',
              'value' => $model->requires_id_photocopy ? '<span class="label label-success">Requires ID Card</span>' : '<span class="label label-danger">Does not require</span>',
              'format' => 'html',
            ],
        ],
    ]) ?>

</div>
