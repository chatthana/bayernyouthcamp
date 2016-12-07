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
            'reg_date',
            'last_reg_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
