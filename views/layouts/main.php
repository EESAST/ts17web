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
<html style="height: 100%">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
  <style>

    .footer{
      position: absolute;
      width: 100%;
      margin-bottom: 0px;
      padding: 0px;
      background:#102020;
    }
    .footer p {
      color: #7f8c8d;
      margin: 0;
      padding: 15px 0;
      text-align: center;
    }
    .content{
      min-height: 100%;
      clear: both;
    }
  </style>

    <script type="text/javascript" name="baidu-tc-cerfication" data-appid="7816487" src="http://apps.bdimg.com/cloudaapi/lightapp.js"></script>
  

  
  <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>


<header class="am-topbar am-topbar-inverse am-margin-0" style=" border:none;">
<div class="am-container">

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-primary am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>


<?php if(Yii::$app->user->isGuest):?>

  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li><a href="<?php echo Url::to(['site/index']); ?>">home</a></li>
    </ul>
    <div class="am-topbar-right">
      <a href="<?php echo Url::to(['register/index']) ?>"><button class="am-btn am-btn-primary am-topbar-btn am-btn-sm"><i class="am-icon-pencil"></i>register</button></a>
    </div>
    <div class="am-topbar-right">
      <a href="<?php echo Url::to(['login/index']) ?>"><button class="am-btn am-btn-primary am-topbar-btn am-btn-sm"><i class="am-icon-user"></i>login</button></a>
    </div>
  </div>
<?php else: ?>
  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
     <li><a href="<?php echo Url::to(['site/index'])?>">home</a></li>
      <li><a href="<?php echo Url::to(['news/index']) ?>">news</a></li>
      <li><a href="<?php echo URl::to(['forum/index']) ?>">forum</a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">more<span class="am-icon-caret-down"></span>
        </a>
        <ul id="dashboard" class="am-dropdown-content am-padding-0" style= "background-color: #fafafa; border: none;">
          <li class="am-active am-dropdown-header">dashboard</li>
          <li class="am-active"><a href="<?php echo Url::to(['dashboard/index']) ?>">个人信息</a></li>
          <li class="am-active" ><a href="<?php echo Url::to(['team/index']) ?>">战队之家</a></li>
          <li class="am-active"><a href="<?php echo Url::to(['supporting-files/index']) ?>">文件下载</a></li>
          <li class="am-active"><a href="<?php echo Url::to(['online-compile/index']) ?>">代码提交</a></li>
        </ul>
      </li>
    </ul>
    <div class="am-topbar-right">
      <a href="<?php echo Url::to(['login/logout']) ?>"><button class="am-btn am-btn-primary am-topbar-btn am-btn-sm"><i class="am-icon-paper-plane"></i>logout</button></a>
    </div>
  </div>
<?php endif; ?>
</div>

</header>
<div class="content">
<?=$content ?>
</div>
 <div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
    <a href="#top" title="">
          <i class="am-gotop-icon am-icon-hand-o-up"></i>
    </a>
</div>

<footer class="footer" >
  <p>© 2015 <a href="#" target="_blank"><?php echo $title;?></a> 
  Licensed<a href="#" target="_blank">Web license</a>. by the ts17web Team.</p>
</footer>

<script>
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
