<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/stbheader.png'),
        'brandUrl' => Yii::$app->urlManager->createUrl(['player/index']),
        'options' => [
            'class' => 'navbar',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'หน้าแรก', 'url' => ['/admin/index']],
            ['label' => 'จัดการสนาม', 'url' => ['/arena/index']],
            ['label' => 'จัดการผู้เล่น', 'url' => ['/player/index']],
            ['label' => 'ระบบทีม', 'url' => ['/team/index']],
            ['label' => 'ระบบจัดการโค้ช', 'url' => ['/coach/index']],
            ['label' => 'จัดการรูปภาพ', 'url' => ['/gallery/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Sport Thai Bavaria <?= date('Y') + 1 ?></p>

        <div class="pull-right">
          <p>Developed by <span style="color:#ff4b00; font-weight:600;">MAPLE VILLAGE&reg;</span></p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
