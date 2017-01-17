<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Players */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="players-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key => $value): ?>
      <div class="alert alert-<?php echo $key; ?>">
        <p><?php echo $value; ?></p>
      </div>
    <?php endforeach; ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Resend PDF', ['resendpdf', 'id' => $model->id], ['class'=>'btn btn-warning']); ?>
        <?= Html::a('View PDF', ['viewpdf', 'id' => $model->id], ['class'=>'btn btn-info']); ?>
        <?= Html::a('Download PDF', ['downloadpdf', 'id'=>$model->id], ['class'=>'btn btn-danger']); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'unique_id',
            'name',
            'name_en',
            'nickname',
            'birthdate',
            'age',
            'identity_card_no',
            // 'identity_card_path:ntext',
            [
              'attribute'=>'photo',
              'value'=>Yii::getAlias('@web') . $model->identity_card_path,
              'format'=>['image', ['width'=>'550']],
            ],
            'school:ntext',
            'year',
            'address:ntext',
            'telephone',
            'line_id',
            'facebook_link:ntext',
            'email:email',
            'foot',
            'pp',
            'ppa',
            'weight',
            'height',
            'team:ntext',
            'source',
            'virtual_team',
            'guardian_name',
            'guardian_telephone',
            'arena',
            'created',
        ],
    ]) ?>

</div>
