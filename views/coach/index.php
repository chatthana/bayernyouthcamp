<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CoachSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coaches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coaches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Coaches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'name_en',
            'identity_card_no',
            // 'identity_card_path:ntext',
            // 'age',
            // 'telephone',
            'email:email',
            'school:ntext',
            // 'address:ntext',
            'virtual_team',
            // 'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
