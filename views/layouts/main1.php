<?php 
use yii\helpers\Url;
use app\assets\MyAppAsset2;
MyAppAsset2::register($this);

$this->title = 'Dashboard';

?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="am-g">
<div class="am-u-lg-2 am-u-md-3 am-u-sm-8">
<div style="width: 70%;" class="am-fr">
<br/>
  <nav data-am-widget="menu" class="am-menu  am-menu-stack"> 
    <a href="javascript: void(0)" class="am-menu-toggle">
          <i class="am-menu-toggle-icon am-icon-bars"></i>
    </a>
      <ul class="am-menu-nav am-avg-sm-1">
          <li class="">
            <a href="<?php echo Url::to(['dashboard/index']) ?>" class="" >个人信息</a>
          </li>    
          <li class="">
            <a href="<?php echo Url::to(['team/index']) ?>" class="" >战队之家</a>
          </li>
          <li class="">
            <a href="<?php echo Url::to(['supporting-files/index']) ?>" class="" >资源下载</a>
          </li>
          <li class="">
            <a href="<?php echo Url::to(['online-compile/index']) ?>" class="" >代码提交</a>
          </li>                  
      </ul>

  </nav>

</div>
</div>
<div class="am-u-lg-8 am-u-md-9 am-sm-10">
  <?= $content ?>
</div>
<div class="am-u-lg-4">
  

</div>
</div>
<?php $this->endContent(); ?>