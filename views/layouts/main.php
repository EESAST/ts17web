<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;
use app\assets\MyAppAsset;
use app\assets\MyAppAsset1;
AppAsset::register($this);
MyAppAsset::register($this);
MyAppAsset1::register($this);
$title='Eatting in Tsinghua'
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
  <style>
    .get {
      background: #1E5B94;
      color: #fff;
      text-align: center;
      padding: 100px 0;
    }
    .get-title {
      font-size: 200%;
      border: 2px solid #fff;
      padding: 20px;
      display: inline-block;
    }

    .get-btn {
      background: #fff;
    }

    .detail {
      background: #fff;
    }

    .detail-h2 {
      text-align: center;
      font-size: 150%;
      margin: 40px 0;
    }
    .detail-h3 {
      color: #1f8dd6;
    }

    .detail-p {
      color: #7f8c8d;
    }

    .detail-mb {
      margin-bottom: 30px;
    }

    .about {
      background: #fff;
      padding: 40px 0;
      color: #7f8c8d;
    }

    .about-color {
      color: #34495e;
    }

    .about-title {
      font-size: 180%;
      padding: 30px 0 50px 0;
      text-align: center;
    }

    .footer p {
      color: #7f8c8d;
      margin: 0;
      padding: 15px 0;
      text-align: center;
      background: #2d3e50;
    }
  </style>
  <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>


<header class="am-topbar am-topbar-fixed-top">
  <div class="am-container">
  <?php if(\Yii::$app->user->isGuest): ?>
    <h1 class="am-topbar-brand">
      <a href="<?php echo \Yii::$app->urlManager->createUrl('site/index') ?>"><?php echo $title;?></a>
    </h1>
    <div class="am-collapse am-topbar-collapse" id="collapse-head">
      <ul class="am-nav am-nav-pills am-topbar-nav ">
        <li id='#News'><a href="<?php echo Url::toRoute('news/index') ;?>">news</a></li>
        </li>
      </ul>
      
      <div class="am-topbar-right">
       	<a href="<?php echo Url::toRoute('register/index') ;?>">
        <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm " ><span class="am-icon-pencil"></span>register</button>
        </a>
      </div>
      <div class="am-topbar-right">
      <!--	<a href="<?php echo Url::toRoute('login/index') ;?>">-->
        <button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm"  id='ontemp' data-am-modal="{target:'#temp'}"><span class="am-icon-user"></span>login</button>
       
      </div>
    </div>

  <?php else: ?>
    <h1 class="am-topbar-brand">
      <a href="<?php echo \Yii::$app->urlManager->createUrl('site/index') ?>"><?php echo $title;?></a>
    </h1>

    <div class="am-collapse am-topbar-collapse" id="collapse-head">
      <ul class="am-nav am-nav-pills am-topbar-nav">
        <li id='News'><a href="<?php echo Url::toRoute('news/index') ;?>" >news</a></li>
        <li id='Dashboard'><a href="<?php echo Url::toRoute('dashboard/index') ;?>">dashboard</a></li>
        <li id='Forum'><a href="<?php echo Url::toRoute('forum/index') ;?>">forum</a></li>
        <li id='Supporting Files'><a href="<?php echo Url::toRoute('supporting-files/index') ;?>">files</a></li>
        <li id='more' class="am-disabled"><a href="#">more</a></li>
      </ul>
      
      <div class="am-topbar-right"> 
        <a href="#">
        <button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm" data-am-offcanvas="{target:'#right'}" ><span class="am-icon-user"></span> <?php echo Yii::$app->user->identity->username ?></button>
        </a>
        <a href="<?php echo Url::toRoute('login/logout') ;?>">
        <button class="am-btn am-btn-warning am-topbar-btn am-btn-sm"><span class="am-icon-power-off"></span> logout</button>
        </a>
      </div>
    <?php endif; ?>
  </div>
</header>
<div class="wrap">
<?= $content ?>
</div>
<footer class="footer" >
  <p>© 2015 <a href="http://www.yunshipei.com" target="_blank"><?php echo $title;?></a> 
  Licensed under <a href="http://opensource.org/licenses/MIT" target="_blank">Web license</a>. by the ts17web Team.</p>
</footer>





<div class="am-modal am-modal-prompt" tabindex='-1' id='temp'>
    <div class="am-modal-dialog" id='login'>
    <?php $form = ActiveForm::begin(['id' => 'login-form','action'=>'index.php?r=login/index']); ?>
        <div class="am-modal-hd">Login</div>
        <input type="text" class="am-modal-prompt-input " id="loginform-username" name="LoginForm[username]"  placeholder="your username" data-validation-message="username required" required/>
        <input type="password" class="am-modal-prompt-input"  id='loginform-password' name="LoginForm[password]" placeholder="your password" data-validation-message="password required" required/>
        <div class="am-modal-footer">     
            <span class="am-modal-btn"  data-am-modal-confirm id='Login'> login</span>
            <span class="am-modal-btn"  data-am-modal-cancel id='Forget'>cancel</span>
        </div>
    <?php ActiveForm::end(); ?>
    </div>

</div>
  <?php if(!\Yii::$app->user->isGuest): ?>
    <div id='right' class="am-offcanvas ">
      <div class='am-offcanvas-bar am-offcanvas-bar-flip'>
        <div class="am-offcanvas-content ">
          <p>welcome <span class="am-text-xl am-text-success"><?=Yii::$app->user->identity->username ?></span></p>
          <p>距离初赛还有<span class="am-text-xxl am-text-warning" >33</span>天</p>
          <p>距离决赛还有<span class="am-text-xxl am-text-warning">66</span>天</p>

        </div> 
      </div>
    </div>
<? endif ?>


<script type="text/javascript">


$('#Login').on('click',function(){
    $('#login-form').submit();
})

$('#Forget').on('click',function(){
    alert('写一个找回密码的页面');
})
$('#'+$(document).attr('title')).addClass('am-active');
</script>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->                      
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
