<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\components\PlayerHelper;
use app\models\Arenas;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPlayers */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Player Viewer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="players-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Players', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'unique_id',
            'name',
            'name_en',
            // 'nickname',
            'birthdate',
            // 'age',
            [
              'attribute' => 'age',
              'label' => 'Age',
              'filter' => ['14'=> 14, '15' => 15, '16' => 16]
            ],
            'identity_card_no',
            // 'identity_card_path:ntext',
            // 'school:ntext',
            // 'year',
            // 'address:ntext',
            // 'telephone',
            // 'line_id',
            // 'facebook_link:ntext',
            // 'email:email',
            // 'foot',
            // 'pp',
            [
              'attribute' => 'pp',
              'label' => 'Position',
              'filter' => ['gk'=>'Goalkeeper', 'df'=>'Defender', 'mf'=>'Midfielder', 'st' => 'Striker']
            ],
            // 'ppa',
            // 'weight',
            // 'height',
            // 'team:ntext',
            [
                'attribute'=>'source',
                'label'=>'Source',
                'filter' => PlayerHelper::getSources()
            ],
            'virtual_team',
            // 'guardian_name',
            // 'guardian_telephone',
            // 'arena',
            [
              'attribute'=>'arena',
              'label'=>'Arena',
              'filter'=>[ArrayHelper::map(Arenas::find()->all(), 'code', 'text')]
            ],
            // 'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
