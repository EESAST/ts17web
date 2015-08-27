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
        'brandLabel' => 'Eat In Tsinghua',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(Yii::$app->user->isGuest){
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Forum', 'url' => ['/forum']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Login', 'url' => ['/login']],
            
        ],
    ]);

    }

    else{
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
            
            ['label' => 'DashBoard', 'url' => ['/dashboard']],
            
        ],
    ]);
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
            ['label' => 'OnlineCompile', 'url' => ['/online-compile']],
            ['label' => 'News', 'url' => ['/news']],
            ['label' => 'SupportingFiles', 'url' => ['/supporting-files']],
            ['label' => 'Forum', 'url' => ['/forum']],
                [
                    'label' => 'Logout ('.Yii::$app->user->identity->teamname.')',
                    'url' => ['/login/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);


    }


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
        <p class="pull-left">&copy; TeamStyle 17 <?= date('Y') ?></p>

        <p class="pull-right">Powered by TeamStyle 17 Web</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
