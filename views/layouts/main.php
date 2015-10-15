<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\MyAppAsset;
MyAppAsset::register($this);
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
        'brandLabel' => "Eating In Tsinghua",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(Yii::$app->user->isGuest){
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                [   'label' => 'Login',
                'url' => ['/login']
                ],
            ['label' => 'Register', 'url' => ['/register'],]
            ],
        ]);
    }

    else{
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
        ],
    ]);
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
            [
                'label' => 'Logout ('.Yii::$app->user->identity->username.')',
                'url' => ['/login/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
        ],
    ]);
    }
    NavBar::end();
    ?>
    <div class="container">
        <div style="float: left;width:10%"><button class="am-btn-primary am-btn " data-am-popover="{content: 'Click me for mavigation!', trigger: 'hover focus'}" data-am-offcanvas="{target: '#doc-oc-demo2', effect: 'push'}">Navigation</button></div>
        <div style="float: left; width:90%"><?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],],['class'=>'am-breadcrumb']) ?></div>
        <br/><br/><!-- 侧边栏内容 -->
        <div id="doc-oc-demo2" class="am-offcanvas">
            <div class="am-offcanvas-bar">
                <div class="am-offcanvas-content">
                    <ul class="am-nav">
                        <li><?= Html::a(Yii::t('app', 'Dashboard'), ['/dashboard'], ['class' => 'am-btn']) ?></li>
                        <li><?= Html::a(Yii::t('app', 'Login'), ['/login'], ['class' => ' am-btn']) ?></li>
                        <li><?= Html::a(Yii::t('app', 'Register'), ['/register'], ['class' => ' am-btn']) ?></li>
                        <li><?= Html::a(Yii::t('app', 'Team'), ['/team'], ['class' => 'am-btn']) ?></li>
                        <li><?= Html::a(Yii::t('app', 'Supporting-files'), ['/supporting-files'], ['class' => ' am-btn']) ?></li>
                        <li><?= Html::a(Yii::t('app', 'Forum'), ['/forum'], ['class' => 'am-btn']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
            $('#my-offcanvas').offCanvas(options);
        </script>
        <?= $content ?>
    </div>
</div>
<footer class="am-footer am-footer-default">
    <div class="container">
        <p class="pull-left">&copy; TeamStyle 17 <?= date('Y') ?></p>

        <p class="pull-right">Powered by TeamStyle 17 Web</p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
