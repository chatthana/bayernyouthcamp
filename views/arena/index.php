<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchArenas */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Arenas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arenas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Arenas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'text:ntext',
            // 'reg_date',
            [
              'attribute' => 'reg_date',
              'label' => 'Registration Date',
              'value' => function($model, $key, $index, $widget) {
                return date('F jS, Y', strtotime($model->reg_date));
              }
            ],
            // 'last_reg_date',
            [
              'attribute' => 'last_reg_date',
              'label' => 'Last Date of Registration',
              'value' => function($model, $key, $index, $widget) {
                return date('F jS, Y', strtotime($model->last_reg_date));
              }
            ],
            // 'region_id',
            [
              'attribute' => 'region_id',
              'value' => function($model, $key, $index, $widget) {
                return app\components\ArenaHelper::getRegionValue($model->region_id);
              },
              'filter' => $regionFilter,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
